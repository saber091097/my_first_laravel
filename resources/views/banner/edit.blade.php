@extends('layouts.app')


@section('pageTitle')
    BANNER管理-新增頁
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
        form img{
            width: 400px;
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
                <h3>BANNER修改</h3>
            </div>
        </div>
        <!-- 中間寄送資料 -->
        <div id="section2">
            <div class="content">
                <form class="d-flex flex-column" action="/banner/update/{{$banner->id}}" method="post" enctype="multipart/form-data"> <!--需跟route對應-->
                    @csrf
                    <div>現在的圖片</div>
                    <img src="{{$banner->img_path}}" alt="" srcset="">
                    <label for="banner_img">BANNER圖片上傳</label>
                    <input type="file" name="banner_img" id="banner_img" value="">

                    <label for="img_opacity">透明度設定</label>
                    <input type="text" name="img_opacity" id="img_opacity" value="{{$banner->img_opacity}}">

                    <label for="weight">權重設定</label>
                    <input type="number" name="weight" id="weight" value="{{$banner->weight}}">

                    <div class="button-box d-flex justify-content-center mt-2">
                        <button class="btn btn-secondary me-3" type="reset" onclick="location.href='/banner'">取消</button>
                        <button class="btn btn-primary" type="submit">修改banner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
