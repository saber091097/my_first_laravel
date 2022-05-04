@extends('template.template')
    @section('css')
    <link rel="stylesheet" href="{{asset('css/shop3.css')}}">
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
                        <div class="info">
                            <h3>寄送資料</h3>
                            <div class="name">
                                <span>姓名</span>
                                <input type="text" placeholder="王小明" class="w-100">
                            </div>
                            <div class="phone">
                                <span>電話</span>
                                <input type="text" placeholder="0912345678" class="w-100">
                            </div>
                            <div class="email">
                                <span>Email</span>
                                <input type="email" placeholder="abc123@gmail.com" class="w-100">
                            </div>
                            <div class="addr d-flex flex-wrap">
                                <div class="div w-100">
                                    <span class="adw">地址</span>
                                </div>
                                <div class="pr w-50">
                                    <input type="text" placeholder="城市" class="w-100">
                                </div>
                                <div class="pl w-50">
                                    <input type="text" placeholder="郵遞區號" class="w-100">
                                </div>
                                <input type="text" placeholder="地址" class="w-100 mg">
                            </div>
                        </div>
                        <div class="allmoney w-100 d-flex justify-content-end">
                            <table class="table d-flex justify-content-between">
                            <tbody>
                              <tr class="d-flex justify-content-between">
                                <td class="fs">數量:</td>
                                <td>3</td>
                              </tr>
                              <tr class="d-flex justify-content-between">
                                <td class="fs">小計:</td>
                                <td>$24.90</td>
                              </tr>
                              <tr class="d-flex justify-content-between">
                                <td class="fs">運費:</td>
                                <td>$24.90</td>
                              </tr>
                              <tr class="d-flex justify-content-between">
                                <td class="fs">總計:</td>
                                <td>$24.90</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="next w-100 d-flex justify-content-between">
                            <a href="shop2" class="left">
                                <button class="leastbot bg-white text-primary">上一步</button>
                            </a>
                            <a href="shop4">
                                <button class="nextbot bg-primary text-light">前往付款</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

