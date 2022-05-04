@extends('layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/shop3.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    @endsection

    @section('main')
        <div class="container-fluid">
            <div class="row w-100 d-flex justify-content-center">
                <div class="shopbox bg-light ">

                    <div class="top">
                        <h3>新增帳號</h3>
                        <span style="color: red;">{{session('problem')}}</span>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    <div class="section">
                        <div class="content">
                            <form action="/account/store" method="POST">
                                @csrf {{-- 埋金鑰 --}}

                                <label for="name"  class="w-100">使用者名稱</label>
                                <input type="text" name="name" id="name" class="w-100">

                                <label for="email" class="w-100">使用者信箱</label>
                                <input type="email" name="email" id="email" class="w-100">

                                <label for="password" class="w-100">使用者密碼</label>
                                <input type="password" name="password" id="password" class="w-100">

                                <label for="password_confirmation" class="w-100">確認密碼</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="w-100">

                                <label for="power" class="w-100">使用者權限</label>
                                <select name="power" id="power" class="w-100">
                                    <option value="1">管理者</option>
                                    <option value="2">一般會員</option>
                                </select>
                                <div class="button-box d-flex justify-content-center mt-2">
                                    <button class="btn btn-secondary me-3" type="reset">取消</button>
                                    <button class="btn btn-primary" type="submit">新增帳號</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


