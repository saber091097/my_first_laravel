@extends('template.template')
    @section('css')
    <link rel="stylesheet" href="{{asset('css/shop2.css')}}">
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
                        <div class="payway">
                            <h3>付款方式</h3>
                            <label for="" class="pay1 d-flex align-items-center">
                                <input type="radio" name="pay">
                                <div class="visa">信用卡付款</div>
                            </label>
                            <label for="" class="pay2 d-flex align-items-center">
                                <input type="radio" name="pay">
                                <div class="atm">網路 ATM</div>
                            </label>
                            <label for="" class="pay1 d-flex align-items-center">
                                <input type="radio" name="pay">
                                <div class="shop">超商代碼</div>
                            </label>
                        </div>
                        <div class="goway">
                            <h3>運送方式</h3>
                            <label for="" class="go1 d-flex align-items-center">
                                <input type="radio" name="go">
                                <div class="visa">黑貓宅配</div>
                            </label>
                            <label for="" class="go2 d-flex align-items-center">
                                <input type="radio" name="go">
                                <div class="atm">超商店到店</div>
                            </label>
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
                            <a href="shop" class="left">
                                <button class="leastbot bg-white text-primary">上一步</button>
                            </a>
                            <a href="shop3">
                                <button class="nextbot bg-primary text-light">下一步</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

