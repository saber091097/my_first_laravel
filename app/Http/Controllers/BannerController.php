<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FilesController;

class BannerController extends Controller
{
    public function index(){
        //將所有banner資料從資料庫拿出來
        $banner_data= Banner::get();
        $header='Banner管理列表頁';
        $slot='';
        return view('banner/index',compact('banner_data','header','slot'));
    }

    //banner 新增組
    public function create(){
        //準備新增用的表單給使用者填寫
        $header='Banner管理新增頁';
        $slot='';
        return view('banner/create',compact('header','slot'));
    }

    public function store(Request $request){
        //將使用者填寫的資料,經過處理(ex:檔案上傳/防呆...)後,新增至資料庫
        $path = Storage::disk('local')->put('public/banner',$request->banner_img);
        $path = str_replace('public','Storage',$path);
        Banner::create([
            'img_path'=>'/'.$path,
            'img_opacity'=>$request->img_opacity,
            'weight'=>$request->weight,
        ]);
        return redirect('/banner');

    }

    //banner 編輯組
    public function edit($id){
        //根據id找到想編輯的資料,將資料連同編輯用的畫面回傳給使用者
        $edit_data = Banner::where('id',$id)->first();
        $header='Banner管理編輯頁';
        $slot='';
        return view('banner.edit',compact('edit_data','header','slot'));
    }

    public function update(Request $request, $id){
        //根據id找到想編輯的資料
        $banner=Banner::find($id)->first();

        //圖片如果沒有做更動則不需用作
        if($request->hasfile('banner_img')){ //hasfile 就是查看banner_img裡面有沒有檔案變更 沒有就不須用做
            $path = FilesController::imgUpload($request->banner_img,'banner');
            // $path = Storage::disk('local')->put('public/banner',$request->banner_img);
            // $path = str_replace('public','Storage',$path);//更改路徑 將public改成Storage 在$path中
            //經過處理(ex:檔案上傳/防呆...)後
            $targer = str_replace('/Storage','public',$banner->img_path);
            Storage::disk('local')->delete($targer);
            //將舊有資料檔案刪除
            $banner->img_path='/'.$path;
        }


        //將新的資料更新到資料庫裡面
        Banner::where('id',$id)->update([
            //'img_path'=>'/'.$path, 上面的if 就是新增圖片的因此不需用在這裏面做
            'img_opacity'=>$request->img_opacity,
            'weight'=>$request->weight,
        ]);
        // $banner->img_path='/'.$path; 另一種新增寫法
        return redirect('/banner');
    }

    public function del($id){
        //使用id找到要刪除的資料,並且連同相關的檔案一起刪除
        $banner=Banner::find($id)->first();
        $targer = str_replace('/Storage','public',$banner->img_path);
        Storage::disk('local')->delete($targer);
        $banner->delete();
        return redirect('/banner'); //重新導向(送出新的request)到列表頁
    }

}
