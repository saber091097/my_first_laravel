<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{
    public function index(){

        $data1 = DB::table('news')->take(3)->get(); //抓最舊的三筆
        $data2 = DB::table('news')->orderby('id','desc')->take(3)->get(); //抓最新的三筆
        // $data3 = DB::table('news')->inRandomOrder()->take(3)->get(); //隨機抓三筆

        // dd($data1,$data2,$data3);


        // return view('shopping.index',['news'=>$data2,'banner'=>$data1,'product'=>$data3]);

        // return view('shopping.index')->with('news',$data2)->with('banner',$data1)->with('product',$data3);

        return view('shopping.index',compact('data2'));

    }
    public function step01(){
        return view('shopping.checkedout1');
    }
    public function step02(){
        return view('shopping.checkedout2');
    }
    public function step03(){
        return view('shopping.checkedout3');
    }
    public function step04(){
        return view('shopping.checkedout4');
    }
}
