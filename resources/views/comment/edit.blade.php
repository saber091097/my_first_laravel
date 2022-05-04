@extends('template.template')
@section('css')
    <link rel="stylesheet" href="{{asset('css/shop3.css')}}">
    @endsection

    @section('main')
        <div class="container-fluid">
            <div class="row w-100 d-flex justify-content-center">
                <div class="shopbox bg-light ">
                    <h3>留言編輯</h3>
                    <div class="content">
                        <form class="form" action="/comment/updata/{{$comment->id}}" method="get">
                            <div class="shopbox-mid">
                                <div class="info">
                                    <div class="name">
                                        <span>留言者姓名</span>
                                        <input type="text"  class="w-100" name="name" value="{{$comment->name}}">
                                    </div>
                                    <div class="title">
                                        <span>標題</span>
                                        <input type="text" class="w-100" name="title" value="{{$comment->title}}">
                                    </div>
                                    <div class="text">
                                        <span>內容</span>
                                        <input type="text" class="w-100" name="text" value="{{$comment->context}}">
                                    </div>
                                </div>
                            </div>
                            <div class="button d-flex justify-content-center">
                                <button type="reset" style="border-radius: 5px; width:auto; background-color:#77797c; border:0; color:white; margin-right:10px; padding:5px;">清除</button>
                                <button type="submit" style="border-radius: 5px; width:auto; background-color:#0774e0; border:0; color:white; padding:5px;">完成編輯</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
