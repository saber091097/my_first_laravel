<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Comment;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        // $data1 = DB::table('news')->take(3)->get(); //抓最舊的三筆
        $newses = DB::table('news')->orderby('id','desc')->take(3)->get(); //抓最新的三筆
        // $data3 = DB::table('news')->inRandomOrder()->take(3)->get(); //隨機抓三筆

        // dd($data1,$data2,$data3);


        // return view('shopping.index',['news'=>$data2,'banner'=>$data1,'product'=>$data3]);

        // return view('shopping.index')->with('news',$data2)->with('banner',$data1)->with('product',$data3);

        return view('index',compact('newses'));


    }


    public function comment(){ // 這段comment功能的目的是為了抓取資料庫所有的留言回傳給頁面

        // 以下這行使用orderby將最新的排序到最前面後, 取出所有資料
        // $comments = DB::table('comments')->orderby('id','desc')->get(); //DB直接存取

        $comments = Comment::orderby('id','desc')->get();  //使用model抓資料

        // 將資料回傳至view頁面 讓頁面可以有資料套版
        return view('comment.comment',compact('comments'));
    }

    public function save_comment(Request $request){

        //DB直接操作
        // DB::table('comments')->insert([
        //     'id' => 1000,
        //     'title' => $request->title,
        //     'name' => $request->name,
        //     'context' => $request->content,
        //     'email'=> '',
        // ]);


        Comment::create([
            'id' => 10000,
            'title' => $request->title,
            'name' => $request->name,
            'context' => $request->content,
            'email'=> '',
        ]);

        return redirect('/comment'); //重新導向 與view不同
    }


    public function edit_comment($id){
        // $comment = DB::table('comments')->where('id', $id)->first(); //從符合條件的筆數中, 抓第一筆 (結果是單筆所以不會是陣列)

        $comment = Comment::find($id); //直接去找match的ID

        return view('comment.edit',compact('comment'));
    }

    public function update_comment($id, Request $request){

        //方法1 DB操作 注意只能用where
        Comment::where('id', $id)->update([
            'title' => $request->title,
            'name' => $request->name,
            'context' => $request->content,
            'email' => '',
        ]);

        return redirect('/comment');
    }

    public function delete_comment($id){

        Comment::where('id', $id)->delete();

        return redirect('/comment');
    }
}
