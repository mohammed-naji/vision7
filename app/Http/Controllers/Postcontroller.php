<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Postcontroller extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::orderByDesc('id')->paginate(20);
        // $posts = Post::simplePaginate(20);
        // $posts = Post::latest('id')->get();
        // $posts = Post::orderBy('id', 'desc')->get();
        // $posts = Post::orderByDesc('id')->get();
        // $posts = Post::select('title', 'body')->get();
        // $posts = Post::select('title', 'body')->take(5)->get();
        // $posts = Post::find(20);
        // $posts = Post::where('id', 20)->get();
        // $posts = Post::where('id', 20)->first();

        // dd($posts);

        // dump(request()->all());
        $count = 20;
        if(request()->has('count') && request()->count != 'all') {
            $count = request()->count;
        }

        if(request()->has('count') && request()->count == 'all') {
            $count = Post::count();
        }

        if(request()->has('search')) {
            $posts = Post::where('title', 'like', '%' . request()->search . '%')->orWhere('body', 'like', '%' . request()->search . '%')->orderByDesc('id')->paginate($count);
        }else {
            $posts = Post::orderByDesc('id')->paginate($count);
        }



        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|min:5|max:50',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg',
            'body' => 'required'
        ]);

        // Upload File
        $img = $request->file('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('uploads'), $img_name);

        // Save to Database
        Post::create([
            'title' => $request->title,
            'image' => $img_name,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.index')->with('msg', 'Post created successfully')->with('type', 'success');
    }

    public function destroy($id)
    {
        // Post::destroy($id);
        $post = Post::find($id);

        File::delete(public_path('uploads/'.$post->image));

        $post->delete();
        return redirect()->route('posts.index')->with('msg', 'Post deleted successfully')->with('type', 'danger');
    }
}
