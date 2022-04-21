@extends('template.template')


@section('pageTitle')
    留言板
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/boostrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/checkedout3.css')}}">
    <style>
        .border-bottom{
            border-width: 3px !important;
            border-color: gray !important;
        }
    </style>
@endsection

@section('main')
<div class="banner .container-fluid">
    <div class="list-detail">
        <!-- 上方留言內容 -->
        <div id="section1" class="container-xxl mb-5">
            <!-- 留言區標題 -->
            <div class="shop-car">
                <h3>留言區</h3>
            </div>
            <!-- 留言們 -->
            @foreach ($comments as $comment)
            <div class="w-100 p-2 mb-2 border-bottom border-light">
                <div class="info d-flex align-items-baseline">
                    <div class="fs-2 me-2">{{$comment->title}}</div>
                    <div class="me-auto">{{$comment->name}}</div>
                    <div>{{ substr($comment->created_at, 5, 2).'月'.substr($comment->created_at, 8, 2).'號'}}</div>
                </div>
                <div class="border border-info">{{$comment->context}}</div>
                <div>
                    <a href="/comment/delete/{{$comment->id}}">刪除</a>
                    <a href="/comment/edit/{{$comment->id}}">編輯</a>
                </div>
            </div>
            @endforeach

        </div>
        <!-- 中間寄送資料 -->
        <div id="section2">
            <div class="tittle">
                <h3>歡迎留言討論~</h3>
            </div>
            <div class="content">
                <form class="form" action="/comment/save" method="GET"> <!--需跟route對應-->
                    <!-- Bootstrap表單 -->
                    <!-- 標題 -->
                    <div class="tel">
                        <div class="mb-1">
                            <label for="formGroupExampleInput2" class="form-label">
                                <h5>標題</h5>
                            </label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="title" placeholder="">
                        </div>
                    </div>
                     <!--留言者姓名 -->
                     <div class="name">
                        <div class="mb-1">
                            <label for="formGroupExampleInput" class="form-label">
                                <h5>留言者姓名</h5>
                            </label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="">
                        </div>
                    </div>
                    <!-- 內容 -->
                    <div class="email">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">
                                <h5>內容</h5>
                            </label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="content" placeholder="">
                        </div>
                    </div>
                    <div class="button-box d-flex justify-content-center">
                        <button class="btn btn-secondary me-3" type="reset">清除 </button>
                        <button class="btn btn-primary" type="submit">送出留言</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

