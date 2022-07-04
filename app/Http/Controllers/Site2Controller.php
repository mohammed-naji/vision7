<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site2Controller extends Controller
{
    public function index()
    {
        $posts = [
            ['title1', 'content1'],
            ['title2', 'content2'],
            ['title3', 'content3'],
            ['title4', 'content4'],
        ];

        return view('site2.index')->with('posts', $posts);
    }

    public function about()
    {
        return view('site2.about');
    }

    public function contact()
    {
        return view('site2.contact');
    }

    public function post()
    {
        return view('site2.post');
    }
}
