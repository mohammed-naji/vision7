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

    public function form2_data(Request $request)
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

    public function form3_data(Request $request)
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

    public function form4()
    {
        return view('forms.form4');
    }

    public function form4_data(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cv' => 'required|file|mimes:pdf|max:148'
        ]);

        // dd($request->all());
        // $name = rand().time().$request->file('cv')->getClientOriginalName();
        // ab.png => 65498764665426465465ab.png

        // w.jpg => 6546546544644654_9879825454654_g.jpg
        // 132956424_2808304259387558_8643559913876415662_n

        // Facebook Naming conveiant
        $ex = $request->file('cv')->getClientOriginalExtension();
        $alpha = range('a', 'g');
        $name = time().'_'.rand(000000000000000, 999999999999999).'_'.rand().'_'.$alpha[rand(0, count($alpha) - 1)].'.'.$ex;

        $request->file('cv')->move(public_path('uploads/cv'), $name);
    }

    public function form5()
    {
        return view('forms.form5');
    }

    public function form5_data(Request $request)
    {
        return now()->format('d-m-Y h:i:s a');
    }
}
