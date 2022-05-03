@extends('layouts.app')


@section('pageTitle')
   商品管理-編輯頁
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<meta name="_token" content="{{ csrf_token() }}">
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
                <h3>會員編輯</h3>
            </div>
        </div>
        <!-- 中間寄送資料 -->
        <div id="section2">
            <div class="content">
                <form class="d-flex flex-column" action="/account/update/{{$account->id}}" method="post" enctype="multipart/form-data"> <!--需跟route對應-->
                    @csrf
                    <label for="mail">使用者帳號</label>
                    <input type="email" id="mail" readonly  value="{{$account->email}}">

                    <label for="name">使用者名稱</label>
                    <input type="text" name="name" id="name" value="{{$account->name}}">

                    <label for="password">使用者密碼</label>
                    <input type="password" name="password" id="password" value="{{$account->password}}">

                    <label for="power">使用者權限</label>
                    <select name="power" id="power">
                        <option value="1" @if ($account->power == 1) selected @endif >管理者</option>
                        <option value="2" @if ($account->power == 2) selected @endif >一般會員</option>
                    </select>

                    <div class="button-box d-flex justify-content-center mt-2">
                        <button class="btn btn-secondary me-3" type="reset" onclick="location.href='/account'">取消</button>
                        <button class="btn btn-primary" type="submit">儲存</button>
                    </div>
                </form>
                {{-- @foreach ($product->imgs as $item)
                    <form action="/product/delete_img/{{$item->id}}" method="post" hidden id="deleteForm{{$item->id}}">
                        @method('DELETE')
                        @csrf
                    </form>
                @endforeach --}}

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        function delete_img(id){
                //準備表單以及內部的資料
            let formData = new FormData();
            formData.append('_method', 'DELETE');
            formData.append('_token', '  {{ csrf_token() }}');
                //將準備好的表單藉由fetch送到後台
            fetch("/product/delete_img/"+id, {
                method: "POST",
                body: formData
            }).then(function(response) {
                //成功從資料庫刪除資料後, 將自己的HTML元素消除
                let element = document.querySelector('#sup_img'+id)
                element.parentNode.removeChild(element);
            })
        }
    </script>
@endsection

