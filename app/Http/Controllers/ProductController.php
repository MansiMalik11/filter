<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\color;
use App\Models\size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * GET API filter the products based on the size_id and the color_id
     */
    public function index(Request $request)
    {
        // $product = Product::with(['size','color'])->get();
        $query = Product::query();
        if($request->filled('size_id')){
            $query->where('size_id' , $request->size_id);
        }

        if ($request->filled('color_id')) {
            $query->where('color_id', $request->color_id);
        }

        $product = $query->get();
        return $product;
    }

    public function view()
    {
        $products = Product::with('color','size')->get();
        return view('products/index',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sizes = Size::all();
        $colors = Color::all();
        return view('products.create', compact('sizes', 'colors'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',        
        ]);

        if($validator->fails()){
            return redirect(route('products.create'))->withErrors($validator)->withInput();
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->size_id = $request->size_id;
        $product->color_id = $request->color_id;
        $product->save();
        //session()->flash('success', 'Product created successfully..');
        return redirect(route('products.view'))->with('success', 'Product created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $sizes = Size::all();
        $colors = Color::all();

        return view('products.edit', compact('product', 'sizes', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->size_id = $request->size_id;
        $product->color_id = $request->color_id;
        $product->save();

        return redirect()->route('products.view')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.view')->with('success', 'Product deleted successfully');
    }
}
