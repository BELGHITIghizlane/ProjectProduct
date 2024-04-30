<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CategoryController;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categores = Category::all();
        return view('Categories.index_categore',['categores'=>$categores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $categores=new Category;
    
    return view('Categories.create_categore' ,compact('categores'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([

             'name'=>'required',

         ]);


         $categores= new Category;

         $categores->name = $request->name;

        $categores->save();

         return redirect()->route('index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('Categories.edit_categore', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required',

        ]);

        // Find the product by ID
        $categore = Category::find($id);

        // Update other fields
        $categore->name = $request->name;

        // Save the product
        $categore->save();

        // Redirect with success message
        return redirect()->route("index")->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categore=Category::find($id);
        $categore->delete();
        return redirect()->route("index");
    }
}
