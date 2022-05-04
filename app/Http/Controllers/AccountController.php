<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index(){
        //將所有account資料從資料庫拿出來
        $user_data= User::get();
        $header='帳號管理列表頁';
        $slot='';
        return view('account/index',compact('user_data','header','slot'));
    }

    public function create(){
        $header='帳號管理新增頁';
        $slot='';
        return view('account/create',compact('header','slot'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // $validator = Validator::make($request->all(),[
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // if ($validator->fails()){
        //     return redirect('account/create')->with('problem','輸入資料有錯誤請從新輸入');
        // }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'power'=> $request->power,
        ]);

        return redirect('/account');
    }

    public function edit($id){
        //根據id找到想編輯的資料,將資料連同編輯用的畫面回傳給使用者
        $user_data= User::where('id',$id)->first();
        $header='Banner管理編輯頁';
        $slot='';
        return view('account.edit',compact('user_data','header','slot'));
    }

    public function update(Request $request,$id){

        $data=User::find($id);

        $data->name=$request->name;
        $data->power=$request->power;

        if (Hash::needsRehash($request->password)) {
            $data->password = Hash::make($request->password);

        }
        $data->save();
        return redirect('/account');
    }

    public function del($id){
        $account=User::find($id);
        $account->delete();
        return redirect('/account');
    }
}
