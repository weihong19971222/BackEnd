<?php

namespace App\Http\Controllers;

use App\Products;
use App\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_type_list=ProductType::all();
        return view('admin/product_type/index', compact('product_type_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_type_list=ProductType::all();
        return view('admin/product_type/create', compact('product_type_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_data=$request->all();
        ProductType::create($request_data);
        return redirect('admin/product_type');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_type_list=ProductType::find($id);
        return view('admin/product_type/edit', compact('product_type_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product_type_list=ProductType::find($id);
        $product_type_list->update($request->all());
        return redirect('admin/product_type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductType::destroy($id);
        $p=Products::where('type_id',$id)->first()->id;
        // dd($p);
        Products::destroy($p);

        return redirect('admin/product_type');
    }
}
