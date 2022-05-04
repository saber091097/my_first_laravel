<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\comment;

class Controller extends BaseController
{
    public function login(){
        return view('login');
    }

    public function comment(){
        // $data = DB::table('comments')->get();
        $data = Comment::get();

        return view('/comment/comment',compact('data'));
    }

    public function save_comment(Request $request){

        // DB::table('comments')->insert([
        //     'title' => $request->title,
        //     'name' => $request->name,
        //     'context' => $request ->text,
        //     'email' => '',
        // ]);

        Comment::create([
            'title' => $request->title,
            'name' => $request->name,
            'context' => $request ->text,
            'email' => '',
        ]);

        return redirect('/comment');//重新導向
    }

    public function del_comment($traget){

        Comment::where('id',$traget)->delete();
        return redirect('/comment');//重新導向
    }

    public function edit_comment($id){
        $comment = Comment::where('id',$id)->first();//抓符合條件的第一筆

        return view('comment.edit',compact('comment'));
    }

    public function updata_comment($id,Request $request){
        Comment::where('id',$id)->update([
            'title' => $request->title,
            'name' => $request->name,
            'context' => $request->text,
            'email' => '',
        ]);
        return redirect('/comment');
    }
}
