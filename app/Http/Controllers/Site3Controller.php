<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site3Controller extends Controller
{
    public function about()
    {
        return view('site3.about');
    }

    public function experiance()
    {
        return view('site3.experiance');
    }

    public function education()
    {
        return view('site3.education');
    }

    public function skills()
    {
        return view('site3.skills');
    }

    public function interests()
    {
        return view('site3.interests');
    }

    public function awards()
    {
        return view('site3.awards');
    }
}
