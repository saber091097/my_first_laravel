<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = ['name','price','amount','introduce','img_path'];
    //每一筆商品資料
    public function imgs(){
        //可以有很多章商品圖片
        return $this->hasMany(Product_img::class,'product_id','id');//格式對照的model::class 對方的欄位 自己的欄位
        //因為是hasmany所以使用時輸出是陣列
    }

    public function shoppingCars(){
        //可以存在於很多個購物名細中
        return $this->hasMany(shopping_cars::class,'product_id','id');
    }
}
