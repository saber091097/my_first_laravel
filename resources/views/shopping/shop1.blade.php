@extends('template.template')
    @section('css')
    <link rel="stylesheet" href="{{asset('css/shop.css')}}">
    @endsection

    @section('main')
        <div class="container-fluid">
            <div class="row w-100 d-flex justify-content-center">
                <div class="shopbox bg-light ">
                    <div class="shopbox-top">
                        <h2 class="w-100">購物車</h2>
                        <div class="steps d-flex justify-content-between">
                            <div class="step d-flex justify-content-center align-items-center" data-text="確認購物車">1</div>
                            <div class="linebox w-auto h-50 d-flex justify-content-center align-items-center">
                                <div class="line rounded-pill">
                                    <div class="colorline rounded-pill"></div>
                                </div>
                            </div>
                            <div class="step d-flex justify-content-center align-items-center" data-text="付款與運送方式">2</div>
                            <div class="linebox w-auto h-50 d-flex justify-content-center align-items-center">
                                <div class="line2 rounded-pill">
                                    <div class="colorline rounded-pill"></div>
                                </div>
                            </div>
                            <div class="step d-flex justify-content-center align-items-center" data-text="填寫資料">3</div>
                            <div class="linebox w-auto h-50 d-flex justify-content-center align-items-center">
                                <div class="line3 rounded-pill">
                                    <div class="colorline rounded-pill"></div>
                                </div>
                            </div>
                            <div class="step d-flex justify-content-center align-items-center" data-text="完成訂購">4</div>
                        </div>
                    </div>
                    <div class="shopbox-mid">
                        <h4>訂單明細</h4>
                        @foreach ( $products as $data)
                        <div class="eat d-flex justify-content-between w-100">
                            <div class="left d-flex ">
                                <img src="{{$data->product->img_path}}" alt="">
                                <div class="foodname d-flex align-items-center">
                                    <div class="foodbox flex-column d-flex">
                                        <span>{{$data->name}}</span>
                                        <p>#41551</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right d-flex align-items-center">
                                <div class="price">
                                    <span id="product_price"></span>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        <div class="allmoney w-100 d-flex justify-content-end">
                            <table class="table d-flex justify-content-between">
                            <tbody>
                              <tr class="d-flex justify-content-between">
                                <td class="fs">數量:</td>
                                <td></td>
                              </tr>
                              <tr class="d-flex justify-content-between">
                                <td class="fs">小計:</td>
                                <td>$24.90</td>
                              </tr>
                              <tr class="d-flex justify-content-between">
                                <td class="fs">運費:</td>
                                <td>$100.00</td>
                              </tr>
                              <tr class="d-flex justify-content-between">
                                <td class="fs">總計:</td>
                                <td>$24.90</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="next w-100 d-flex justify-content-between">
                            <div class="left">
                                <i class="fa-solid fa-arrow-left"></i>返回購物
                            </div>
                            <a href="shop2">
                                <button class="nextbot bg-primary text-light">下一步</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@section('js')
    <script>
            var product_price = document.querySelector('#product_price')
            for (var i = 0; i < array.length; i++) {
                total = {!! $data->product->price !!}*{!! $data->qty !!};
                product_price.innerHTML=total
            }
    </script>
@endsection