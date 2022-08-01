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
        $post = new Post();
        return view('posts.create', compact('post'));
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

    // Normal Form Delete
    // public function destroy($id)
    // {
    //     // Post::destroy($id);
    //     $post = Post::find($id);

    //     File::delete(public_path('uploads/'.$post->image));

    //     $post->delete();
    //     return redirect()->route('posts.index')->with('msg', 'Post deleted successfully')->with('type', 'danger');
    // }

    public function destroy($id)
    {
        // Post::destroy($id);
        $post = Post::find($id);

        File::delete(public_path('uploads/'.$post->image));

        $post->delete();

        $posts = Post::orderByDesc('id')->paginate(20);
        return view('posts.table', compact('posts'))->render();
    }

    public function edit($id)
    {
        // $post = Post::find($id);
        // if(!$post) {
        //     abort(404);
        // }
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'title' => 'required|min:5|max:50',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg',
            'body' => 'required'
        ]);

        $post = Post::findOrFail($id);
        $img_name = $post->image;
        if($request->hasFile('image')) {
            // Upload File
            $img = $request->file('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('uploads'), $img_name);
        }

        // Save to Database
        $post->update([
            'title' => $request->title,
            'image' => $img_name,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.index')->with('msg', 'Post updated successfully')->with('type', 'warning');
    }
}
