@extends('template.template')
    @section('css')
    <link rel="stylesheet" href="{{asset('css/shop4.css')}}">
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
                    <h1 class="title text-center">訂單成立</h1>
                    <h4>訂單明細</h4>
                    <div class="eat d-flex justify-content-between">
                        <div class="left d-flex">
                            <img src="./img/EEguU02.jpg" alt="">
                            <div class="foodname d-flex align-items-center">
                                <div class="foodbox flex-column d-flex">
                                    <span>Chicken momo</span>
                                    <p>#41551</p>
                                </div>
                            </div>
                        </div>
                        <div class="right d-flex align-items-center">
                            <div class="cou">x1</div>
                            <div class="price">
                                <span>$10.50</span>
                            </div>
                        </div>
                    </div>
                    <div class="eat d-flex justify-content-between bb">
                        <div class="left d-flex">
                            <img src="./img/Uv2Yqzo.jpg" alt="">
                            <div class="foodname d-flex align-items-center">
                                <div class="foodbox flex-column d-flex">
                                    <span>Spicy Mexican potatoes</span>
                                    <p>#66999</p>
                                </div>
                            </div>
                        </div>
                        <div class="right d-flex align-items-center">
                            <div class="cou">x1</div>
                            <div class="price">
                                <span>$10.50</span>
                            </div>
                        </div>
                    </div>
                    <div class="eat d-flex justify-content-between bb">
                        <div class="left d-flex">
                            <img src="./img/xbTAITF.jpg" alt="">
                            <div class="foodname d-flex align-items-center">
                                <div class="foodbox flex-column d-flex">
                                    <span>Breakfast</span>
                                    <p>#86577</p>
                                </div>
                            </div>
                        </div>
                        <div class="right d-flex align-items-center">
                            <div class="cou">x1</div>
                            <div class="price">
                                <span>$10.50</span>
                            </div>
                        </div>
                    </div>
                    <div class="info">
                        <h4>寄送資料</h4>
                        <div class="name d-flex pm">
                            <h4 class="p4 ww">姓名</h4>
                            <h4 class="p4">王曉明</h4>
                        </div>
                        <div class="phone d-flex pm">
                            <h4 class="p4 ww">電話</h4>
                            <h4 class="p4">0912345678</h4>
                        </div>
                        <div class="email d-flex pm">
                            <h4 class="p4 ww">Email</h4>
                            <h4 class="p4">abc123@gmail.com</h4>
                        </div>
                        <div class="addr d-flex pm">
                            <h4 class="p4 ww">地址</h4>
                            <h4 class="p4">409 台中市小鎮村英雄路1號</h4>
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
                    <div class="next w-100 d-flex justify-content-end">
                        <a href="bootstrap">
                            <button class="nextbot bg-primary text-light">返回首頁</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
