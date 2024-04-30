<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $products = Product::all();
        return view('Products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $products=new Product;
    $categoreis=Category::all();
    return view('products.create' ,compact('products','categoreis'));
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
            'description'=>'required',
             'quantity'=>'required|numeric',
             'image'=>'required|image',
             'price'=>'required|numeric',

         ]);

         $produit= new Product;


         if($request->hasFile('image')){
           $drf=  $request->file('image')->store('images');

         };
         $produit->name= $request->name ;
         $produit->description= $request->description ;
         $produit->quantity= $request->quantity ;
         $produit->price= $request->price ;
         $produit->image=$drf;
        //  dd($produit);

         $produit->save();
         return redirect()->route("products");


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
    public function edit(string $id)
    {

        $product=Product::find($id);
        $categoreis=Category::all();
        return view('products.edit',compact('product','categoreis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'image' => 'required|image', // Ensure image is required and it's an actual image
            'price' => 'required',
            'category_id'=>'required|numeric',
        ]);

        // Find the product by ID
        $product = Product::find($id);


        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images'); // Change 'images' to your desired storage path
            // Update the image path in the database
            $product->image = $imagePath;
        }

        // Update other fields
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
       

        // Save the product
        $product->save();

        // Redirect with success message
        return redirect()->route("")->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route("products");
    }
}
