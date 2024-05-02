<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'image' => 'required', // Ensure image is required and it's an actual image
            'price' => 'required',
            'category_id'=>'required',
        ]);



        // Find the product by ID
        $product = Product::find($id);



        // Handle the image upload


        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image) {
                Storage::delete($product->image);
            }

            // Upload the new image
            $imagePath = $request->file('image')->store('images'); // Change 'images' to your desired storage path
            $product->image = $imagePath;
        }





        // Update other fields
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category_id;



        // Save the product
        $product->save();

        // Redirect with success message
        return redirect()->route("products")->with('success', 'Product updated successfully.');
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
