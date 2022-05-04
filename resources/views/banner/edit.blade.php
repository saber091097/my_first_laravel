@extends('layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/shop3.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        .edit_img{
            width: 300px;
            height: 300px;
        }
    </style>
    @endsection

    @section('main')
        <div class="container-fluid">
            <div class="row w-100 d-flex justify-content-center">
                <div class="shopbox bg-light ">

                    <div class="top">
                        <h3>banner新增</h3>
                    </div>

                    <div class="section">
                        <div class="content">
                            <form action="/banner/update/{{$edit_data->id}}" method="POST" enctype="multipart/form-data">
                                @csrf {{-- 埋金鑰 --}}
                                <img src="{{$edit_data->img_path}}" alt="" class='edit_img'>
                                <label for="banner_img">BANNER圖片上傳</label>
                                <input type="file" name="banner_img" id="banner_img" >

                                <label for="img_opacity">透明度設定</label>
                                <input type="text" name="img_opacity" id="img_opacity" value="{{$edit_data->img_opacity}}">

                                <label for="weight">權重設定</label>
                                <input type="number" name="weight" id="weight" value="{{$edit_data->weight}}">

                                <div class="button-box d-flex justify-content-center mt-2">
                                    <button class="btn btn-secondary me-3" type="reset">取消</button>
                                    <button class="btn btn-primary" type="submit">更新banner</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


