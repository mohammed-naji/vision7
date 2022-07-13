<?php

namespace App\Http\Controllers;

use App\Rules\WorldCount;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function form1()
    {
        return view('forms.form1');
    }

    public function form1_data(Request $request)
    {
        // dd($request->all());
        return 'Welcome '. $request->name;
        // dd($request->name);
    }

    public function form2()
    {
        return view('forms.form2');
    }

    public function form2_date(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        // dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only(['name', 'email']));


        // $name = $request->input('name');
        // $name = $request->post('name');
        $name = $request->name;
        $email = $request->email;
        $gender = $request->gender;
        $country = $request->country;

        return view('forms.form2_data', compact('name', 'email', 'gender', 'country'));
    }

    public function form3()
    {
        return view('forms.form3');
    }

    public function form3_date(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:30',
            'body' => ['required', new WorldCount()]
        ], [
            'title.required' => 'هذا الحقل مطلوب ي باشااااا',
            'min' => 'اكتب كلام اكتر ي حبيبنا'
        ]);

        // dd($request->all());
    }
}
