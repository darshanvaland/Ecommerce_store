<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('products.index' ,compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function product(Request $request){

        if($request->ajax()){   
            $data= Product::latest()->get();
                return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action' ,function($row){
                    $btn ='<button type="button" class="btn btn-primary btn-round" data-products_id ="'.$row->products_id.'" id="product_edit">Edit</button> ';
                    $btn .='<button type="button" class="btn btn-danger btn-round" data-products_id ="'.$row->products_id .'" id="prodcut_delete">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

        };
        $categories = Category::all();
        return view('backends.product.index',compact('categories'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->category_id = $request->input('product_category');
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_desc = $request->input('product_desc');

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products'), $filename);
            $product->product_image = 'uploads/products/' . $filename;
        }
    
        $product->save();
        return response()->json(['status' => 'Product Created Successfully.']);

        
    }

    /*
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $product->category_id = $request->input('product_category');
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_desc = $request->input('product_desc');

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products'), $filename);
            $product->product_image = 'uploads/products/' . $filename;
        }
    
        $product->save();
        return response()->json(['status' => 'Product Created Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['status' => "Product Deleted suucess fully"]);
    }
}
