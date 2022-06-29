<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public function home()
    {
        return 'home page';
    }

    public function about()
    {
        return 'about page';
    }

    public function contact()
    {
        return 'contact page';
    }

}
