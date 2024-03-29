<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function __construct() {
        
        $this->middleware('auth')->except(['index','show']);
     }
    public function index()
{
    $perPage = 5; // Nombre d'éléments par page
    $products = Product::latest()->paginate($perPage);

    return view('products.index', compact('products'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'nullable|max:2048',
            'image' => 'required|image|mimes:png,jpg,svg,jpeg|max:2048',
            'type' => 'required|in:electronique,informatique',
        ]);
    
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }
    
        // Vérifiez si un produit avec le même nom existe déjà
        $existingProduct = Product::where('name', $input['name'])->first();
    
        if ($existingProduct) {
            // Incrémentez la colonne "Qte" s'il existe déjà
           
            $existingProduct->increment('Qte');
        } else {
            $input['Qte'] = 1;
            // Créez un nouveau produit s'il n'existe pas
            Product::create($input);
        }
    
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request ->validate([
            'name' => 'required',
            'price' => 'required',
            'description'=>'nullable|max:2048',
            'type' => 'required|in:electronique,informatique',
        ]);
        $input=$request->all();
        if($image= $request->file('image')){
            $destinationPath='images/';
            $profileImage=date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$profileImage);
            $input['image']="$profileImage";
        }
        else{
            unset($input['image']);
        }
           $product->update($input);
           return redirect()->route('products.index')
           ->with('success','Product Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
        ->with('success','Product deleted successfully');
    }
}
