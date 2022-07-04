<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site1Controller extends Controller
{
    public function index()
    {
        $title = 'Mohammed Naji Abu Alqumbuz';
        $desc = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti quam possimus praesentium eius aliquid dignissimos, rem accusantium velit id labore expedita molestias accusamus exercitationem ullam quia nisi vero voluptas ratione.';
        // return view('index')->with('title', $title)->with('desc', $desc);
        return view('index', compact('title', 'desc'));
        // return view('index', [
        //     'title' => $title,
        //     'desc' => $desc
        //     ]
        // );

    }
}
