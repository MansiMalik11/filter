<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

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
        return view('products/index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products/create');     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => 'required',
            'sku' => 'required|unique:products,sku',
            'price' => 'required|numeric',
            'status' => 'required',
            'image' => 'image:mimes:jpg,png.jpeg|max:2048',
        ]);

        if($validator->fails()){
            return redirect(route('products.create'))->withErrors($validator)->withInput();
        }
        
        // dd("sdfddf");die;
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        // $product->image = $request->image;
        $product->status = $request->status;
        $product->save();
        //session()->flash('success', 'Product created successfully..');
        return redirect(route('products.index'))->with('success', 'Product created successfully');

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
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
