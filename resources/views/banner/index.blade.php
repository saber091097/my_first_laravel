@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop3.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .border-bottom {
            border-width: 3px !important;
            border-color: gray !important;
        }

        .banner_img {
            width: 250px;
        }

        main #section1 {
            height: unset;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row w-100 d-flex justify-content-center">
            <div class="shopbox bg-light ">
                <div class="top">
                    <h3>banner管理</h3>
                    <a href="banner/create"><button>新增banner</button></a>

                </div>
                <table id="banner_list" class="display w-100">
                    <thead>
                        <tr>
                            <th>圖片預覽</th>
                            <th>圖片權重</th>
                            <th class="text-center">功能</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banner_data as $data)
                            <tr>
                                <td>
                                    <div class="banner_img">
                                        <img src="{{ $data->img_path }}" alt="" class="w-100"
                                            style="opacity: {{ $data->img_opacity }}">
                                    </div>
                                </td>
                                <td>{{ $data->weight }}</td>
                                <td class="center">
                                    <a href="/banner/edit/{{ $data->id }}"><button
                                            class="btn btn-success">編輯</button></a>
                                    <button class="btn btn-danger"
                                        onclick="document.querySelector('#deleteForm{{ $data->id }}').submit()">刪除</button>
                                        <form action="/banner/del/{{ $data->id }}" id="deleteForm{{ $data->id }}" method="POST"
                                            hidden>
                                            @csrf
                                        </form>
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('banner').DataTable();
        });
    </script>
@endsection
