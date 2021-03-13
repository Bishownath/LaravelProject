<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Using this controller will make an effect to all the functions below
     * Create a new controller instance.
     *
     * @return void
     * This constructor is used here for the access only after login
     */
    public function __construct()
    {
        $this->middleware('auth');  
        // can be applied for some pages using only, and except
        // $this->middleware('auth')->only(['index', 'show']);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::all();
        // return view('categories.index')->with(
        //     [
        //         'categories'=> $categories,
        //     ]
        // );
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     $validatedData = $this->validate($request, [
    //         'name' => 'required|min:1|max:255|string',
    //   ]);

    //   $user = Category::create($validatedData);
    // //   Category::create($validatedData);

    //   return redirect()
    //     ->route('categories.index')
    //     ->with('success','You have successfully created a Category!');
    // dd('In Category Store');

    Category::create($request->all());
    return redirect()
        ->route('categories.index')
        ->withSuccess('You have successfully created a category.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete(); //delete the category
        return redirect()
            ->route('categories.index')
            ->with('danger','You have successfully deleted a category.');
    }
}
