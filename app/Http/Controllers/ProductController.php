<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductRequest;
use DB;
use App\Product;

class ProductController extends Controller
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


    public function index(){
        $categories= Category::all();
        $products= Product::all();
    	return view('products.index')->with([
            'products'=>$products,
            'categories'=>$categories,
        ]);
    }

    public function create(){
    	// return view('products/create');
        // redirect()->route('products.create', compact('product'));

        $categories = Category::all();
        return view('products.create')->with( [
            'categories' => $categories
        ]);
    }

    public function store(ProductRequest $request){
        
        // $product= Product::create($request->validated());
        // uploading image testing
        $imageInput= $request->except('image');
        $image= $request->image;
        if($image){
            $imageName= $image->getClientOriginalName();
            $image->move('img/products',$imageName);
            $imageInput['image']= $imageName;
        }

        $product= Product::create($imageInput);
        // $product->category()->sync($request->categories);

        return redirect()
                ->route('products.index')
                ->with('success',"New product of id {$product->id} has been created ");
        
    }

     public function show(Product $product, Category $categories){
      
        // $product=Product::findOrFail($product);
        $products= Product::with('category_id')->get();

        return view('products.show')->with(
            [
                'product'=>$products,
                'category'=>$categories,
            ]);
    	
    }


// putting Product (from model) in parameter for edit will findOrFail the $product automatically which saves time and code. Make the instance of the product.
     public function edit(Product $product){
        
        // $product= Product::findOrFail($product);
        $category= Category::all();
        return view('products.edit')->with([    
            'product'=>$product,
            'categories'=>$category,
        ]);
    }

    public function update(ProductRequest $request, Product $product){

        // $product= Product::findOrFail($product);
            $categories= Category::all();   
            $product->update($request->all());
            return redirect()
                ->route('products.index')
                ->with([
                    'product'=> $product,
                    'categories'=>$categories,
                ])
                ->with('success',"Product of id {$product->id} has been updated ");

        //     if ($request->stock==0 && $request->status== 'available') {
        //     // session()->flash('error', 'Stock of product must me 1 or more if it is available');
        //     return redirect()
        //         ->back()
        //         ->withErrors('Stock must me 1 or more if it is available');
        // }
        //     // session()->forget('error'); 
        //     // return redirect()->back();  
        // return redirect()->action('ProductController@index');
    }


    public function destroy(Product $product){
        // dd(' In Deleted');
        // $product = Product::findOrFail ($product);

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success',"Deleted! ID {$product->id} product has been deleted ");
    }


}
