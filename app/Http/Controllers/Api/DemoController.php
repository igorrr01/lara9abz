<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index ()
    {
        return 'This text will show when you Authotorize with API (Bearer token)';
    }
}
