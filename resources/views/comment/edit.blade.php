@extends('template.template')


@section('pageTitle')
    留言板-編輯頁
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
                <h3>留言編輯</h3>
            </div>
        </div>
        <!-- 中間寄送資料 -->
        <div id="section2">
            <div class="content">
                <form class="form" action="/comment/update/{{$comment->id}}" method="GET"> <!--需跟route對應-->
                    <!-- Bootstrap表單 -->
                    <!-- 標題 -->
                    <div class="tel">
                        <div class="mb-1">
                            <label for="formGroupExampleInput2" class="form-label">
                                <h5>標題</h5>
                            </label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="title" placeholder="" value="{{$comment->title}}">
                        </div>
                    </div>
                    <!--留言者姓名 -->
                    <div class="name">
                        <div class="mb-1">
                            <label for="formGroupExampleInput" class="form-label">
                                <h5>留言者姓名</h5>
                            </label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="" value="{{$comment->name}}" >
                        </div>
                    </div>

                    <!-- 內容 -->
                    <div class="email">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">
                                <h5>內容</h5>
                            </label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="content" placeholder="" value="{{$comment->context}}">
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

