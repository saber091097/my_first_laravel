<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\shop;
use App\Models\shopping_cars;
use App\Models\Product_img;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\ShopCartController;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(){
        $data = shop::get();
        $header='商品管理列表頁';
        $slot='';
        return view('shop/index',compact('data','header','slot'));
    }

    public function add(){
        $header='商品新增頁';
        $slot='';
        return view('shop/add',compact('header','slot'));
    }

    public function store(Request $request){
        $path = FilesController::imgUpload($request->product_img,'product');

        $product = shop::create([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
            'introduce'=> $request->introduce,
            'img_path'=>$path,
        ]);
        if ($request->hasfile('second_img')){
            foreach ($request->second_img as $key => $value) {
                $path = FilesController::imgUpload($value,'product');
                $targer = str_replace('/storage','public',$product->img_path);
                Product_img::create([
                    'product_id'=>$product->id,
                    'img_path' => $path,
                ]);
            }
        }

        return redirect('/shop');
    }

    public function edit($id){
        $edit_data = shop::find($id);
        $header='商品編輯頁';
        $slot='';
        return view('shop/edit',compact('edit_data','header','slot'));
    }

    public function update($id,Request $request){
        $product = shop::find($id)->first();

        if($request->hasfile('product_img')){
            $path = FilesController::imgUpload($request->product_img,'product');
            $targer = str_replace('/storage','public',$product->img_path);
            Storage::disk('local')->delete($targer);
            $product->img_path=$path;
        }

        if ($request->hasfile('second_img')){
            foreach ($request->second_img as $key => $value) {
                $path = FilesController::imgUpload($value,'product');
                Product_img::create([
                    'product_id'=>$product->id,
                    'img_path' => $path,
                ]);
            }
        }

        shop::where('id',$id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
            'introduce'=> $request->introduce,
            'img_path'=> $product->img_path,
        ]);
        return redirect('/shop');
    }

    public function del($id){
        $product=Shop::find($id);

        $product_path=Product_img::where('product_id',$id)->get();

        // 次要圖片可能有很多筆 所以用foreach刪除多筆圖片
        foreach ($product_path as $key => $value) {
            FilesController::deleteUpload($value->img_path);
            $value->delete();
        }

        $path = FilesController::deleteUpload($product->img_path);
        $product->delete();
        return redirect('/shop');
    }

    public function delete_img($id){
        $img = Product_img::find($id);

        FilesController::deleteUpload($img->img_path);
        //資料刪除前先將商品id取出稍後頁面導引需要用到
        $product_id = $img->product_id;
        $img->delete();

        return redirect('shop/edit/'.$product_id);
    }

    public function product($id){
        $edit_data = shop::find($id);
        $header='商品編輯頁';
        $slot='';
        return view('shop/product',compact('edit_data','header','slot'));
    }

    public function add_cart(Request $request){
        $product= shop::find($request->product_id);
        if($request->add_qty > $product->amount){
            $result = [
                'result' => 'error',
                'message' => '預想購買更多請聯繫廠商'
            ];
            return $result;
        }elseif($request->add_qty<1){
            $result = [
                'result' => 'error',
                'message' => '購買數量異常'
            ];
            return $result;
        }
        //檢查是否登入 !Auth::check() 因為加上! 反轉結果 所以現在
        if(!Auth::check()){
            $result = [
                'result' => 'error',
                'message' => '請先登入'
            ];
            return $result;
        }

        shopping_cars::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::user()->id,
            'qty' => $request->add_qty,
        ]);

        $result = [
            'result' => 'success',
        ];

        return $result;
        return redirect('/shop1');
    }
}
