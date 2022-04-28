@extends('layouts.app')


@section('pageTitle')
    BANNER管理
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
                    @foreach ($banners as $banner)
                    <tr>
                        <td>
                            <div class="banner_img">
                                <img src="{{$banner->img_path}}" alt="" class="w-100" style="opacity: {{$banner->img_opacity}}">
                            </div>
                        </td>
                        <td>{{$banner->weight}}</td>
                        <td>
                            <button class="btn btn-success" onclick="location.href='/banner/edit/{{$banner->id}}'">編輯</button>
                            <button class="btn btn-danger" onclick="document.querySelector('#deleteForm{{$banner->id}}').submit();">刪除</button>
                            <form action="/banner/delete/{{$banner->id}}" method="post" hidden id="deleteForm{{$banner->id}}">
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
        $('#banner_list').DataTable();
    });
    </script>
@endsection

