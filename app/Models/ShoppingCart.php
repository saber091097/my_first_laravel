<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;


/**
 * @property integer $id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $qty
 */
class ShoppingCart extends Model
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

    // 下方為對商品關聯

    //每一筆想採買的物品
    public function product(){
        // 一定是店裡賣的某一件商品
        return $this->hasOne(Product::class,'id','product_id');
    }

    // 下方為對使用者關聯
    public function user(){
        // 一定屬於某一個使用者
        return $this->belongsTo(User::class,'user_id','id');
    }
}
