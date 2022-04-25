@extends('template.template')


@section('pageTitle')
    BANNER管理
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
                <h3>BANNER管理</h3>
                <a href="/banner/create" class="btn btn-success">新增BANNER</a>
            </div>
            <!-- 留言們 -->
            <table id="banner_list" class="display">
                <thead>
                    <tr>
                        <th>圖片預覽</th>
                        <th>圖片權重</th>
                        <th>功能</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="banner_img">
                                <img src="{{asset('img/homework-img/400x400.png')}}" alt="" class="w-100">
                            </div>
                        </td>
                        <td>1</td>
                        <td>
                            <button class="btn btn-success">編輯</button>
                            <button class="btn btn-danger">刪除</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="banner_img">
                                <img src="{{asset('img/homework-img/400x400.png')}}" alt="" class="w-100">
                            </div>
                        </td>
                        <td>1</td>
                        <td>
                            <button class="btn btn-success">編輯</button>
                            <button class="btn btn-danger">刪除</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="banner_img">
                                <img src="{{asset('img/homework-img/400x400.png')}}" alt="" class="w-100">
                            </div>
                        </td>
                        <td>1</td>
                        <td>
                            <button class="btn btn-success">編輯</button>
                            <button class="btn btn-danger">刪除</button>
                        </td>
                    </tr>

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
        $('#banner_list').DataTable();
    });
    </script>
@endsection

