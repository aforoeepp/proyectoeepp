<?php

namespace App\Http\Controllers\Aforo;

use App\Http\Controllers\Controller;
use App\Models\aforo\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('aforo.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aforo.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       
        $request->validate([
            'name'=>'required'   
        ]);

        $category= new Category();
        $category->name=$request->name;     
        $category-> save();

        return redirect()->route('aforo.category.index')->with('info', 'La categoria se creó con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('aforo.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required'  
        ]);
        
        //$user= new User();
        $category->name=$request->name;      
        $category-> save();

        return redirect()->route('aforo.category.index')->with('info', 'La categoria se actualizó con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
