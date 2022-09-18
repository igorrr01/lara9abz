<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tinify\Tinify;
use Illuminate\Support\Str;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function create ()
    {
        $photos = Photo::all();
        return view('add-photo', compact('photos'));
    }

    public function store (Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'photo' => 'required|image',
        ]);

        if ($validator->fails()) {
            session()->flash('status', 'Upload error');
		    return back();    
        }

        \Tinify\setKey("HCKMTVKBT0NdmQCnwB9hl49SLRJQS3wD");

        $source = \Tinify\fromFile($request->file('photo'));
        $resized = $source->resize(array(
            "method" => "cover",
            "width" => 70,
            "height" => 70
        ));
        $randName = Str::random(10);
        $resized->toFile("public/photos/".$randName.".jpg");

        Photo::create([
            'url' => $randName. ".jpg"
        ]);
        
        session()->flash('status', 'Done');
        return back();    
    }
}
