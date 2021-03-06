<?php

namespace App\Http\Controllers;

use App\ProductImages;
use App\Products;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_list=Products::with('product')->get();
        return view('admin/product/index', compact('news_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ProductType_list=ProductType::all();
        return view('admin/product/create',compact('ProductType_list'));
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
        if($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $path = $this->fileUpload($file,'Product');
            $request_data['product_image'] = $path;
        }

        $product=Products::create($request_data);
        // dd($product);
        $product_id=$product->id;
        // dd($product_id);

        if($request->hasFile('info_image2')){
            $files = $request->file('info_image2');
            foreach($files as $file){
                $path = $this->fileUpload($file,'Product');
                ProductImages::create([
                    'img_url'=>$path,
                    'product_id'=>$product_id
                ]);
            }
        }

        return redirect('admin/product');

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
        dd(Products::find($id)->products_image);
        $news_list=Products::with('product')->find($id);
        $news_lists=ProductType::with('product_type')->get();
        return view('admin/product/edit', compact('news_list','news_lists'));
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
        $news_list=Products::find($id);
        $request_data=$request->all();
        if($request->hasFile('product_image')) {
            $old_image = $news_list->product_image;
            File::delete(public_path().$old_image);
            $file = $request->file('product_image');
            $path = $this->fileUpload($file,'News');
            $request_data['product_image'] = $path;
        }
        $news_list->update($request_data);
        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news_list=Products::find($id);
        $old_image = $news_list->img_url;
        File::delete(public_path().$old_image);

        Products::destroy($id);
        return redirect('admin/news');
        $news_list=Products::find($id);
        $old_image = $news_list->img_url;
        File::delete(public_path().$old_image);

        Products::destroy($id);
        return redirect('admin/product');
    }
    private function fileUpload($file,$dir){
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if( ! is_dir('upload/')){
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if ( ! is_dir('upload/'.$dir)) {
            mkdir('upload/'.$dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time().md5(rand(100, 200))).'.'.$extension;
        //移動到指定路徑
        move_uploaded_file($file, public_path().'/upload/'.$dir.'/'.$filename);
        //回傳 資料庫儲存用的路徑格式
        return '/upload/'.$dir.'/'.$filename;
    }

}
