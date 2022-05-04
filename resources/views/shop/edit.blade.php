@extends('layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/shop3.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        th,
        td {
            padding: 0;
            text-align: center;
        }

        .btn_add {
            padding: 6px 12px;
            border: 0;
            border-radius: 5px;
            background-color: darkorchid;
            color: white;
        }

        .edit_img {
            width: 300px;
            height: 300px;
        }

    </style>
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row w-100 d-flex justify-content-center">
            <div class="shopbox bg-light ">
                <div class="content" style=" padding-top:20px;">
                    <form action="/shop/update/{{ $edit_data->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="shopbox-mid">
                            <div class="info">
                                <h3>產品新增欄位</h3>
                                <div>目前主要圖片</div>
                                <img src="{{ $edit_data->img_path }}" alt="" class='edit_img'>
                                <label for="product_img">商品圖片上傳</label>
                                <input type="file" name="product_img" id="product_img">
                                <div>目前次要圖片</div>
                                <label for="second_img">產品次要圖片上傳</label>
                                <input type="file" name="second_img[]" id="second_img" class="border-0"
                                    accept="image/*" multiple>
                                @foreach ($edit_data->imgs as $item)
                                    <div class="d-flex flex-column">
                                        <div class="seimg" id="sup_img{{$item->id}}">
                                            <img src="{{ $item->img_path }}" alt="" style="width:150px">
                                            <button style="color:white; background-color:red;" type="button"
                                                onclick="delete_img({{$item->id}})" >刪除圖片</button>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="name">
                                    <span>品名</span>
                                    <input type="text" class="w-100" name="name" value="{{ $edit_data->name }}">
                                </div>
                                <div class="price">
                                    <span>價格</span>
                                    <input type="text" class="w-100" name="price"
                                        value="{{ $edit_data->price }}">
                                </div>
                                <div class="amount">
                                    <span>數量</span>
                                    <input type="text" class="w-100" name="amount"
                                        value="{{ $edit_data->amount }}">
                                </div>
                                <div class="intro">
                                    <span>介紹</span>
                                    <input type="text" class="w-100" name="introduce"
                                        value="{{ $edit_data->introduce }}">
                                </div>
                            </div>
                        </div>
                        <div class="button d-flex justify-content-center">
                            <button type="reset"
                                style="border-radius: 5px; width:auto; background-color:#77797c; border:0; color:white; margin-right:10px; padding:5px;">清除</button>
                            <button type="submit"
                                style="border-radius: 5px; width:auto; background-color:#0774e0; border:0; color:white; padding:5px;">更新</button>
                        </div>
                    </form>
                    {{-- @foreach ($edit_data->imgs as $item)
                        <form action="/shop/del_img/{{ $item->id }}" method="POST" hidden
                            id="deleteForm{{ $item->id }}">
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
            //新增一個表單
            let formData = new FormData();
            //用apppend來將formData表單添加值進去
            formData.append('_method','POST');
            formData.append('_token','{{csrf_token()}}');
            //利用fetch功能來進行刪除功能
            fetch('/shop/del_img/'+id,{  //fetch路徑是 route所對應刪除圖片的路徑
                method:'POST',
                body: formData
            }).then(function(response){
                //銷毀div表格
                let element = document.querySelector('#sup_img'+id)
                element.parentNode.removeChild(element);
            })
        }
    </script>
@endsection
