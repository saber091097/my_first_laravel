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
    .btn{
        width: 70px;
        height: 30px;
        color: white;
        background-color: green;
        padding: 0;
        text-align: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 20px;
    }
    .btn1{
        width: 70px;
        height: 30px;
        color: white;
        background-color: red;
        padding: 0;
        text-align: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 20px;
        border-radius: 5px;
        text-decoration: unset;
    }
    .btn1:hover{
        color: black;
    }
    img{
        width: 250px;
        height: 250px;
    }
</style>
@endsection

 @section('main')
        <div class="container-fluid">
            <div class="row w-100 d-flex justify-content-center">
                <div class="shopbox bg-light ">
                    <div class="top d-flex justify-content-between">
                        <h3>商品列表</h3>
                        <a href="shop/add"><button class="btn_add" >新增</button></a>

                    </div>
                    <table id="banner_list" class="display">
                        <thead>
                            <tr >
                                <th style="width: 250px;">商品圖片</th>
                                <th style="width: 100px;">品名</th>
                                <th style="width: 20px;">價格</th>
                                <th style="width: 50px;">數量</th>
                                <th>介紹</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $goods)
                            <tr>
                                <td>
                                    <div class="shop_img">
                                        <a href="shop/product/{{$goods->id}}">
                                            <img src="{{ $goods->img_path }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>{{$goods->name}}</td>
                                <td>{{$goods->price}}</td>
                                <td>{{$goods->amount}}</td>
                                <td>{{$goods->introduce}}</td>
                                <td class="d-flex">
                                    <a href="/shop/edit/{{$goods->id}}" class="btn">編輯</a>
                                    <button class="btn btn-danger"
                                    onclick="document.querySelector('#deleteForm{{ $goods->id }}').submit()">刪除</button>
                                    <form action="/shop/del/{{ $goods->id }}" id="deleteForm{{ $goods->id }}" method="POST"
                                        hidden>
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="/">返回購物</a>
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
