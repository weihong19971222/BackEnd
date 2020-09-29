<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $news_list=DB::table('news')->orderBy('id','desc')->take(3)->get();
        return view('front/index', compact('news_list'));
    }
    public function news(){
        $news_list=DB::table('news')->orderBy('id','desc')->paginate(5);
        return view('front/news', compact('news_list'));
    }
    public function news_info($news_id){
        $news_list=DB::table('news')->where('id','=',$news_id)->first();
        return view('front/news_info', compact('news_list'));
    }
    public function contact_us(){
        return view('front/contact_us');
    }

}
