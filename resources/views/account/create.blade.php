@extends('layouts.app')



@section('pageTitle')
   會員管理-新增頁
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
        .error{
            color: red;
            font-weight: bold;
            font-size: 18px;
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
                <h3>帳號新增</h3>
                <span class="error"> {{ session('problem') }} </span>
                @foreach ($errors->all() as $item)
                    {{$item}}<br>
                @endforeach

            </div>
        </div>
        <!-- 中間寄送資料 -->
        <div id="section2">
            <div class="content">
                <form class="d-flex flex-column" action="/account/store" method="post" enctype="multipart/form-data"> <!--需跟route對應-->
                    @csrf
                    <label for="name">使用者名稱</label>
                    <input type="text" name="name" id="name">

                    <label for="email">使用者信箱</label>
                    <input type="email" name="email" id="email">

                    <label for="password">使用者密碼</label>
                    <input type="password" name="password" id="password">

                    <label for="password_confirmation">確認密碼</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">

                    <div class="button-box d-flex justify-content-center mt-2">
                        <button class="btn btn-secondary me-3" type="reset" onclick="location.href='/account'">取消</button>
                        <button class="btn btn-primary" type="submit">新增管理者</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

