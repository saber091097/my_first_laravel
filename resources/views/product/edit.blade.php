@extends('template.template')


@section('pageTitle')
   商品管理-編輯頁
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/boostrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/checkedout3.css')}}">
    <style>
        .border-bottom{
            border-width: 3px !important;
            border-color: gray !important;
        }
        main #section1{
            height: unset;
        }
    </style>
@endsection

@section('main')
<div class="banner container-fluid">
    <div class="list-detail">
        <!-- 上方留言內容 -->
        <div id="section1" class="container-xxl mb-5">
            <!-- 留言區標題 -->
            <div class="shop-car">
                <h3>商品編輯</h3>
            </div>
        </div>
        <!-- 中間寄送資料 -->
        <div id="section2">
            <div class="content">
                <form class="d-flex flex-column" action="/product/update/{{$product->id}}" method="post" enctype="multipart/form-data"> <!--需跟route對應-->
                    @csrf
                    <img src="{{$product->img_path}}" alt="" style="width:300px;">
                    <label for="product_img">商品圖片上傳</label>
                    <input type="file" name="product_img" id="product_img">

                    <label for="product_name">商品名稱</label>
                    <input type="text" name="product_name" id="product_name" value="{{$product->product_name}}">

                    <label for="product_price">商品價格</label>
                    <input type="number" name="product_price" id="product_price" value="{{$product->product_price}}">

                    <label for="product_detail">商品詳情</label>
                    <input type="text" name="product_detail" id="product_detail" value="{{$product->product_detail}}">

                    <label for="product_qty">商品數量</label>
                    <input type="number" name="product_qty" id="product_qty" value="{{$product->product_qty}}">

                    <div class="button-box d-flex justify-content-center mt-2">
                        <button class="btn btn-secondary me-3" type="reset" onclick="location.href='/product'">取消</button>
                        <button class="btn btn-primary" type="submit">編輯商品</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

