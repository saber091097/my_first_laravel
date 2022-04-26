@extends('template.template')


@section('pageTitle')
    商品管理
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/boostrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/checkedout3.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        .border-bottom{
            border-width: 3px !important;
            border-color: gray !important;
        }
        .banner_img{
            width: 250px;
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
            <div class="shop-car d-flex justify-content-between mb-2">
                <h3>商品管理</h3>
                <a href="/product/create" class="btn btn-success">新增商品</a>
            </div>
            <!-- 留言們 -->
            <table id="product_list" class="display">
                <thead>
                    <tr>
                        <th>商品圖片</th>
                        <th>商品名稱</th>
                        <th>商品價格</th>
                        <th>商品描述</th>
                        <th>商品數量</th>
                        <th>功能</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>
                            <div class="banner_img">
                                <img src="{{$product->img_path}}" alt="" class="w-100">
                            </div>
                        </td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_price}}</td>
                        <td>{{$product->product_detail}}</td>
                        <td>{{$product->product_qty}}</td>
                        <td>
                            <button class="btn btn-success" onclick="location.href='/product/edit/{{$product->id}}'">編輯</button>
                            <button class="btn btn-danger" onclick="document.querySelector('#deleteForm{{$product->id}}').submit();">刪除</button>
                            <form action="/product/delete/{{$product->id}}" method="post" hidden id="deleteForm{{$product->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
    crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready( function () {
        $('#product_list').DataTable();
    });
    </script>
@endsection

