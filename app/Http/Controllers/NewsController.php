<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_list=DB::table('news')->orderBy('id','desc')->get();
        return view('admin/news/index', compact('news_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/news/create');
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
        // $flie_name=$request->file('img_url')->store('','public');
        // $request_data['img_url']=$flie_name;

        // $imageName = time().'.'.$request->img_url->getClientOriginalExtension();
        // $request->img_url->move(public_path('/uploaded_images'), $imageName);
        if($request->hasFile('img_url')) {
            $file = $request->file('img_url');
            $path = $this->fileUpload($file,'News');
            $request_data['img_url'] = $path;
        }

        News::create($request_data);

        // $new_news = new News();
        // $new_news->title = $request->title;
        // $new_news->sub_title = $request->sub_title;
        // $new_news->img_url = '';
        // $new_news->cont = $request->content;
        // $new_news->save();

        return redirect('admin/news');
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
        $news_list=News::find($id);
        return view('admin/news/edit', compact('news_list'));
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
        $news_list=News::find($id);
        $request_data=$request->all();
        if($request->hasFile('img_url')) {
            $old_image = $news_list->img_url;
            File::delete(public_path().$old_image);
            $file = $request->file('img_url');
            $path = $this->fileUpload($file,'News');
            $request_data['img_url'] = $path;
        }
        $news_list->update($request_data);
        return redirect('admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news_list=News::find($id);
        $old_image = $news_list->img_url;
        File::delete(public_path().$old_image);

        News::destroy($id);
        return redirect('admin/news');
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
