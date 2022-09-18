<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderByDesc('id')->paginate(6);
        
        if ($request->ajax()) {
            $html = '';

            foreach ($users as $user) {
                $html.='<tr>
                <th scope="row">'.$user->id.'</th>
                <td>'.$user->first_name.'</td>
                <td>'.$user->last_name.'</td>
                <td>'.$user->city.'</td>
                <td>'.$user->email.'</td>
                <td>'.$user->birthday.'</td>
                </tr>';
            }

            return $html;
        }

        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAddRequest $request)
    {

        $validated = $request->validated();
    
        $validated = $request->safe()->only(['first_name', 'last_name', 'city', 'birthday', 'email', 'password']);

        $creating = User::create([
            'first_name' => $validated['first_name'],
            'last_name' =>  $validated['last_name'],
            'city' =>  $validated['city'],
            'birthday' =>  $validated['birthday'],
            'email' =>  $validated['email'],
            'userAgent' =>  $_SERVER['HTTP_USER_AGENT'],
            'password' =>  Hash::make($validated['password']),
        ]);

        if(!$creating){
            return 'DB Error';
        }
        $request->session()->flash('status', 'User has added');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
