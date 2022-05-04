<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\shopping_cars;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{

    public function shop1(){
        $products= shopping_cars::where('user_id',Auth::user()->id)->get();
        return view('shopping/shop1',compact('products'));
    }

    public function shop2(){
        return view('shopping/shop2');
    }

    public function shop3(){
        return view('/shopping/shop3');
    }

    public function shop4(){
        return view('shopping/shop4');
    }





}
