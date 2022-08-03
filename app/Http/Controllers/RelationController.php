<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Insurance;
use App\Models\Post;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function one_to_one()
    {
        // $user = User::find(1);
        // // $insurance = Insurance::where('user_id', $user->id)->first();

        // dd($user->insurance);

        $insurance = Insurance::find(1);

        dd($insurance->user);

        $users = User::with('insurance')->get();

        // dd($users);

        return view('relations.one_to_one', compact('users'));
    }

    public function one_to_many()
    {
        // $post = Post::find(1);
        // dd($post->comments);

        // $comment = Comment::find(3);
        // dd($comment->user);

        $id = 5;

        $post = Post::with('comments', 'comments.user')->where('id', $id)->first();
        return view('relations.one_to_many', compact('post', 'id'));
    }

    public function one_to_many_data(Request $request)
    {
        // Comment::create([
        //     'comment' => $request->comment,
        //     'post_id' => $request->post_id,
        //     'user_id' => 3
        // ]);

        $post = Post::find($request->post_id);

        $post->comments()->create([
            'comment' => $request->comment,
            'user_id' => 3
        ]);

        return redirect()->back();
    }

    public function many_to_many()
    {
        // $std = Student::find(1);

        // dd($std->subjects);

        // $subject = Subject::find(4);

        // dd($subject->students);

        $subjects = Subject::all();
        $std = Student::find(1);

        return view('relations.many_to_many', compact('subjects', 'std'));
    }

    public function many_to_many_data(Request $request)
    {
        // dd($request->all());

        $std = Student::find(1);

        $std->subjects()->sync($request->subject);

        // $std->subjects()->attach(); // Just For add
        // $std->subjects()->detach(); // Just For Remove
        // $std->subjects()->sync(); // Do the two proccess

        return redirect()->back();
    }
}
