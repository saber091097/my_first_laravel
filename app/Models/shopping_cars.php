<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $qty
 */
class shopping_cars extends Model
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
    protected $fillable = ['created_at', 'updated_at', 'product_id', 'user_id', 'qty'];
    //每一筆使用者想採買的商品
    public function product(){
        //一定是區域賣的某一件商品
        return $this->hasOne(Shop::class,'id','product_id');
    }

    public function user(){
        //一定屬於某一個使用者
        return $this->belongsTo(User::class,'user_id','id');
    }
}
