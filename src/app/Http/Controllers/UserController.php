<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerStep1()
    {
        return view ('step1');
    }

    public function login()
    {
        return view ('login');
    }

    public function registerStep2()
    {
        return view('step2');
    }
}
