<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Place;
use App\Products;
use App\ProductType;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $news_list=DB::table('news')->orderBy('id','desc')->take(3)->get();
        return view('front/index', compact('news_list'));
    }
    public function news(){
        $news_list=DB::table('news')->orderBy('id','desc')->paginate(3);
        return view('front/news', compact('news_list'));
    }
    public function news_info($news_id){
        $news_list=DB::table('news')->where('id','=',$news_id)->first();
        return view('front/news_info', compact('news_list'));
    }
    public function contact_us(){
        return view('front/contact_us');
    }

    public function contact_us_table(Request $request){
        // dd($request->location);
        // DB::table('place')->insert(
        //     ['email' => $request->email,
        //      'location' => $request->location,
        //      'photo' => '',
        //      'place_name' => $request->place_name,
        //      'place_info' => $request->place_info,]
        // );
        Place::create($request->all());
        return '成功';
    }
    public function products(){
        $product_lists=ProductType::with('product_type')->get();
        // dd($product_list);
        return view('front/products',compact('product_lists'));
    }
    public function products_info($products_id){
        $products_list=products::find($products_id);
        return view('front/product_info', compact('products_list'));
    }

}
