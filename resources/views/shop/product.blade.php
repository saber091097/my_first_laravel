@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/shop3.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="shopbox w-100 bg-light d-flex">
                            <div class="shop_left w-50 d-flex justify-content-center align-items-center flex-column">
                                <img src="{{ $edit_data->img_path }}" alt="" class='edit_img'>
                                <div class="container-fluid">
                                    <div class="swiper mySwiper" style="width: auto; height:100px;">
                                        <div class="swiper-wrapper">
                                            @foreach ($edit_data->imgs as $item)
                                                <div class="swiper-slide">
                                                    <img src="{{ $item->img_path }}" alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="shop_right d-flex flex-column w-50">
                                <div class="name">
                                    <h2>{{ $edit_data->name }}</h2>
                                </div>
                                <div class="intro">
                                    <span>{{ $edit_data->introduce }}</span>
                                </div>
                                <div class="price d-flex justify-content-end">
                                    <h3>價格 ${{ $edit_data->price }}</h3>
                                </div>
                                <div class="button d-flex justify-content-end align-items-center">
                                    <div class="amount me-2">
                                        <span>剩餘數量 {{ $edit_data->amount }}</span>
                                    </div>
                                    <label for=""  id="minus" name="minus" style="margin:0 10px; font-size:16px;">-</label>
                                    <input type="number" value="1" class="count" id="qty" name="qty"
                                        style="width: 100px;">
                                    <label for="" id="plus" name="plus" style="margin:0 10px; font-size:16px;">+</label>
                                    <button type="button" onclick="" id="add_product"
                                        style="border-radius: 5px; width:auto; background-color:#0774e0; border:0; color:white; padding:5px;">加入購物車
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            cssMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            mousewheel: true,
            keyboard: true,
        });
    </script>
    <script>
        function delete_img(id) {
            //新增一個表單
            let formData = new FormData();
            //用apppend來將formData表單添加值進去
            formData.append('_method', 'POST');
            formData.append('_token', '{{ csrf_token() }}');
            //利用fetch功能來進行刪除功能
            fetch('/shop/del_img/' + id, { //fetch路徑是 route所對應刪除圖片的路徑
                method: 'POST',
                body: formData
            }).then(function(response) {
                //銷毀div表格
                let element = document.querySelector('#sup_img' + id)
                element.parentNode.removeChild(element);
            })
        }
    </script>
    <script>
        const minus = document.querySelector('#minus')
        const qty = document.querySelector('#qty')
        const plus = document.querySelector('#plus')
        const add_product = document.querySelector('#add_product')


        minus.onclick = function() {
            //用parseInt 將字串轉換為數字
            if (parseInt(qty.value) >= 2){
                qty.value = parseInt(qty.value) - 1
            }
        }

        plus.onclick = function() {
            if (parseInt(qty.value) < {!! $edit_data->amount !!}){
                qty.value = parseInt(qty.value) + 1
            }
        }

        add_product.onclick = function add_product() {
            var formData = new FormData();
            formData.append('add_qty', parseInt(qty.value));
            formData.append('product_id', {!! $edit_data->id !!});
            formData.append('_token', '{{  csrf_token() }}');

            fetch('/add_to_cart', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .catch(error => {
                    alert('新增失敗')
                    return 'error';
                })
                .then(response => {
                    if (response != 'error'){
                        if (response.result == 'success'){
                            alert('新增成功')
                        }else{
                            alert('新增失敗 ,' + response.message)
                        }
                    }
                });

        }
    </script>
@endsection
