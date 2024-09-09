<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(Auth::check()) {
            if($request->ajax()){
                $data = Category::latest()->get();
                    return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action' , function($row){
                        $btn = '<a href="javascript:void(0)" data-category_id="'.$row->category_id.'" class="edit btn btn-primary btn-sm edit_category" id="editbtn" >Edit</a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-category_id="'.$row->category_id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete_category">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            };
            return view('backends.category.index');
        }else{
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->category_desc = $request->input('category_desc');
        $category->save();
        return response()->json(['status' =>  'Category created successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);

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
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->category_name = $request->input('category_name');
        $category->category_desc = $request->input('category_desc');
        $category->save();
        return response()->json(['status' =>  'Category Updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['status' => 'Category deleted successs']);
    }
}
