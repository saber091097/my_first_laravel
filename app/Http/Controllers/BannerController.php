<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;
use App\Http\Controllers\FilesController;

class BannerController extends Controller
{

    public function index()
    {
        // 將所有banner資料從資料庫拿出來 並且輸出到列表頁上
        $banners = Banner::get();
        return view('banner.index',compact('banners'));
    }

    // banner 新增組
    public function create()
    {
        //準備新增用的表單給使用者填寫
        return view('banner.create');
    }

    public function store(Request $request)
    {
        //將使用者填寫的資料, 經過處理(EX:檔案上傳/防呆...)後,

        // 上傳檔案並產生路徑 (laravel內建作法)
        //$path = Storage::disk('local')->put('public/banner', $request->banner_img);
        //$path = str_replace("public","storage",$path); //將路徑中的public置換成storage
        // 上傳檔案並產生路徑 (FilesController作法)
        $path = FilesController::imgUpload($request->banner_img, 'banner');

        //新增至資料庫
        Banner::create([
            'img_path' => $path,
            'img_opacity' => $request->img_opacity,
            'weight' => $request->weight,
        ]);

        return redirect('/banner');
    }


    //banner編輯組
    public function edit($id)
    {
        // 根據id找到想編輯的資料. 將資料連同編輯用的畫面回傳給使用者
        $banner = Banner::find($id);
        return view('banner.edit',compact('banner'));
    }


    public function update(Request $request, $id)
    {
        // 根據id找到想修改的資料.
        $banner = Banner::find($id);

        // 使用者上傳的資料 先經過處理(EX:檔案上傳/防呆...)後
        if ($request->hasfile('banner_img')){

            $path = FilesController::imgUpload($request->banner_img, 'banner');

            // 將舊有資料檔案刪除 (laravel內建作法)
            // $target = str_replace("/storage","public",$banner->img_path); //將路徑中的storage恢復成public
            // Storage::disk('local')->delete($target);  //刪除舊圖片

            FilesController::deleteUpload($banner->img_path);

            // 將新的資料更新到資料庫裏面
            $banner->img_path = $path;
        }
        $banner->img_opacity =  $request->img_opacity;
        $banner->weight =  $request->weight;
        $banner->save();

        return redirect('/banner');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 使用id 找到要刪除的資料, 並且連同相關檔案一起刪除
        $banner = Banner::find($id);
        //$target = str_replace("/storage","public",$banner->img_path); //將路徑中的storage恢復成public
        //Storage::disk('local')->delete($target);  //刪除舊圖片
        FilesController::deleteUpload($banner->img_path);
        $banner->delete();

        return redirect('/banner'); // 重新導向(送出新的request)到列表頁
    }
}
