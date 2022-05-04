<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property string $img_path
 * @property integer $product_id
 */
class Product_img extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */

    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'img_path', 'product_id'];
    //每一張商品圖片
    public function product(){

        // return $this->hasOne(Shop::class,'id','product_id');//格式對照的model::class 對方的欄位 自己的欄位
        //必定屬於抹一個商品
        return $this->belongto(Shop::class,'product_id','id');//格式對照的model::class 自己的欄位 對方的欄位

        //兩個做的事是一樣的
    }
}
