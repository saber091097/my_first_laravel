@extends('layouts.app')


@section('pageTitle')
    會員管理
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
                <h3>會員管理</h3>
                <a href="/account/create" class="btn btn-success">新增管理者</a>
            </div>
            <!-- 留言們 -->
            <table id="account_list" class="display">
                <thead>
                    <tr>
                        <th>使用者名稱</th>
                        <th>信箱</th>
                        <th>權限</th>
                        <th>功能</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            @if ($item->power == 1)
                                管理者
                            @else
                                一般會員
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-success" onclick="location.href='/account/edit/{{$item->id}}'">編輯</button>
                            <button class="btn btn-danger" onclick="document.querySelector('#deleteForm{{$item->id}}').submit();">刪除</button>
                            <form action="/account/delete/{{$item->id}}" method="post" hidden id="deleteForm{{$item->id}}">
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
        $('#account_list').DataTable();
    });
    </script>

    @if (session('success'))
    <script>
        alert(" {{ session('success')}}  ")
    </script>
    @endif




@endsection

