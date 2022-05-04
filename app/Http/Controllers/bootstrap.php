<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Shop;
use App\Models\User;

class bootstrap extends Controller
{
    // public function index(){
    //     $data1 = DB::table('news')->take(3)->get();
    //     $datas = DB::table('news')->find(1); 抓id=1
    //     $datas = DB::table('news')->take(1)->get(); 抓1筆資料

    //     $data3 = DB::table('news')->inRandomOrder()->take(3)->get();

    //     dd($data1,$data2,$data3);
    //     return view('welcome');
    // }

    public function bootstrap(){
        $data2 = DB::table('news')->orderBy('id', 'desc')->take(3)->get(); //orderBy('','') 第一格要取哪個 ,決定升續還降續
        // return view('bootstrap',['news' => $data2],['banner'=>$data1]);  第一種取資料
        // return view('bootstrap')->with('name',$data2)->with('banner',$data1); 第二種方法
        $product_data = Shop::take(8)->get();
        $main_product = Shop::inRandomOrder()->take(1)->get();
        return view('bootstrap',compact('data2','product_data','main_product'));
    }

}
