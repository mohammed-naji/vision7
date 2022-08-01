<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = 20;
        if(request()->has('count') && request()->count != 'all') {
            $count = request()->count;
        }

        if(request()->has('count') && request()->count == 'all') {
            $count = Category::count();
        }

        if(request()->has('search')) {
            $categories = Category::where('title', 'like', '%' . request()->search . '%')->orWhere('body', 'like', '%' . request()->search . '%')->orderByDesc('id')->paginate($count);
        }else {
            $categories = Category::orderByDesc('id')->paginate($count);
        }

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view('categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|min:5|max:50',
        ]);

        // Save to Database
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('msg', 'Category created successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'name' => 'required|min:5|max:50',
        ]);

        // Save to Database
        Category::find($id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('msg', 'Category updated successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        $categories = Category::orderByDesc('id')->paginate(20);
        return view('categories.table', compact('categories'))->render();
    }
}
