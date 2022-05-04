@extends('layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/shop3.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<style>
    th,td{
        padding: 0;
        text-align: center;
    }
    .btn_add{
        padding: 6px 12px;
        border: 0;
        border-radius: 5px;
        background-color: darkorchid;
        color: white;
    }
</style>
@endsection

 @section('main')
        <div class="container-fluid">
            <div class="row w-100 d-flex justify-content-center">
                <div class="shopbox bg-light ">
                    <div class="content" style=" padding-top:20px;">
                        <form action="/shop/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="shopbox-mid">
                                <div class="info">
                                    <h3>產品新增欄位</h3>
                                    <label for="product_img">產品主要圖片上傳</label>
                                    <input type="file" name="product_img" id="product_img" class="border-0" accept="image/*">
                                    <label for="second_img">產品次要圖片上傳</label>
                                    <input type="file" name="second_img[]" id="second_img" class="border-0" accept="image/*" multiple>
                                    <div class="name">
                                        <span>品名</span>
                                        <input type="text"  class="w-100" name="name">
                                    </div>
                                    <div class="price">
                                        <span>價格</span>
                                        <input type="text" class="w-100" name="price">
                                    </div>
                                    <div class="amount">
                                        <span>數量</span>
                                        <input type="text" class="w-100" name="amount">
                                    </div>
                                    <div class="intro">
                                        <span>介紹</span>
                                        <input type="text" class="w-100" name="introduce">
                                    </div>
                                </div>
                            </div>
                            <div class="button d-flex justify-content-center">
                                <button type="reset" style="border-radius: 5px; width:auto; background-color:#77797c; border:0; color:white; margin-right:10px; padding:5px;">清除</button>
                                <button type="submit" style="border-radius: 5px; width:auto; background-color:#0774e0; border:0; color:white; padding:5px;">新增</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('js')
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready( function () {
            $('#banner_list').DataTable();
        } );
        </script>
        @endsection
