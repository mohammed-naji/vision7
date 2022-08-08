<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

    public function custom_posts()
    {
        $posts = Post::viewer()->get();
        // $posts = Post::all();

        dd($posts);
    }

}
