@extends('template.template')
@section('css')
    <link rel="stylesheet" href="{{asset('css/shop3.css')}}">
    @endsection

    @section('main')
        <div class="container-fluid">
            <div class="row w-100 d-flex justify-content-center">
                <div class="shopbox bg-light ">
                    <h3>留言區</h3>
                    @foreach ($data as $comment)
                        <div class="shopbox-top">
                            <div class="allbox" style="margin: 20px 0; ">
                                <div class="one d-flex">
                                    <div class="title d-flex align-items-end" style="font-size: 20px">
                                        {{$comment->title}}
                                    </div>
                                    <div class="name d-flex align-items-end" style="font-size: 10px">
                                        {{$comment->name}}
                                    </div>
                                    <div class="time d-flex align-items-end" style="margin-left:auto; font-size: 10px; ">
                                        {{substr($comment->updated_at,0,10)}}
                                    </div>
                                </div>
                                <div class="text d-flex flex-wrap" style="border:2px solid #e52525;">
                                    {{$comment->context}}
                                </div>
                                @auth
                                <a href="comment/delete/{{$comment->id}}">刪除</a>
                                <a href="comment/edit/{{$comment->id}}">修改</a>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                    <div class="content">
                        <form class="form" action="/comment/save" method="get">
                            <div class="shopbox-mid">
                                <div class="info">
                                    <h3>歡迎留言討論~</h3>
                                    <div class="name">
                                        <span>留言者姓名</span>
                                        <input type="text"  class="w-100" name="name">
                                    </div>
                                    <div class="title">
                                        <span>標題</span>
                                        <input type="text" class="w-100" name="title">
                                    </div>
                                    <div class="text">
                                        <span>內容</span>
                                        <input type="text" class="w-100" name="text">
                                    </div>
                                </div>
                            </div>
                            <div class="button d-flex justify-content-center">
                                <button type="reset" style="border-radius: 5px; width:auto; background-color:#77797c; border:0; color:white; margin-right:10px; padding:5px;">清除</button>
                                <button type="submit" style="border-radius: 5px; width:auto; background-color:#0774e0; border:0; color:white; padding:5px;">送出留言</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
