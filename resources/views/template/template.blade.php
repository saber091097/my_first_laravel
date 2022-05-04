<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @yield('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .link{
            color: black;
            text-decoration: unset;
        }
        .link:hover{
            color: black;
        }
    </style>
</head>

<body>
    <nav name='header'>
        <div class="container-xxl">
            <div class="row justify-content-between">
                <div class="col-2 logoimg">
                    <a href="/">
                        <img src="{{asset('img/logo.svg')}}" width=auto height="60px" alt="" style="height: 60px;">
                    </a>
                </div>
                <div class="rightnav col-10 col-md-9 align-items-center d-flex">
                    <a href="comment"class="text-black d-flex align-items-center col-1 fw-bolder navhover justify-content-center h-50" style="text-decoration:none; ">
                        留言板</a>
                    <div class="iclass">
                        <div>
                            <a href="/shop" style="color: unset">
                                <i class="fas fa-shopping-cart fs-4" ></i>
                            </a>
                        </div>
                        @auth
                        <div>
                            @if (Auth::user()->power == 1)
                                <a href="/dashboard">後台</a>
                            @endif
                        </div>

                        <div class="dropdown" >
                            <div class="p-0 " style='margin-right:5px;'>{{Auth::user()->name}}你好</div>
                            <a class="logout" href="" onclick="event.preventDefault(); document.querySelector('#logout').submit()">登出</a> {{-- event.preventDefault();停止你之前的動作 第二種方法 --}}
                            <form action="logout" method="POST" class="d-flex m-0" hidden id="logout">
                                @csrf
                                {{-- <button type="submit">登出</button> 第一種方法 --}}
                            </form>
                        </div>
                        @endauth
                        @guest
                        <div class="dropdown p-0" >
                            <a class="btn dropdown-hide loginicon" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuOffset" data-bs-offset="-140,20">
                                <i class="fas fa-user-circle fs-3 loginbutton "></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" >
                                <li class="h-100">
                                    <div class="flipthis-wrapper p-0 m-0 w-auto h-100 d-flex justify-content-start" >
                                        <a class="dropdown-item d-flex justify-content-center" href="login">Login</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main>
        @yield('main')
    </main>
    <footer>
        <section id="sitemap">
            <div class="container-fluid">
                <div class="row d-flex justify-content-between">
                    <div class="left d-flex flex-column w-25 col-md-4">
                        <div class="leftimg">
                            <img src="{{asset('img/logo.svg')}}" alt="">
                            <span class="company">數位方塊</span>
                        </div>
                        <div class="word">
                            <span class="comw">Air plant banjo lyft occupy retro adaptogen indego</span>
                        </div>
                    </div>
                    <div class="right d-flex  col-md-7 h-auto">
                        <ul class="w-25 justify-content-end col-4 md">
                            <h2 class="h2c ">CATEGORIES</h2>
                            <li class="lictr">First Link</li>
                            <li class="lictr">Second Link</li>
                            <li class="lictr">Third Link</li>
                            <li class="lictr">Fourth Link</li>
                        </ul>
                        <ul class="w-25 col-md-4 md">
                            <h2 class="h2c">CATEGORIES</h2>
                            <li class="lictr">First Link</li>
                            <li class="lictr">Second Link</li>
                            <li class="lictr">Third Link</li>
                            <li class="lictr">Fourth Link</li>
                        </ul>
                        <ul class="w-25 col-4 md">
                            <h2 class="h2c">CATEGORIES</h2>
                            <li class="lictr">First Link</li>
                            <li class="lictr">Second Link</li>
                            <li class="lictr">Third Link</li>
                            <li class="lictr">Fourth Link</li>
                        </ul>
                        <ul class="w-25 col-4 md">
                            <h2 class="h2c">CATEGORIES</h2>
                            <li class="lictr">First Link</li>
                            <li class="lictr">Second Link</li>
                            <li class="lictr">Third Link</li>
                            <li class="lictr">Fourth Link</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="copyright">
            <div class="container-fluid">
                <div class="row d-flex justify-content-between">

                    <div class="leftword w-auto opacity-75">© 2020 Tailblocks —
                        <a href="https://twitter.com/knyttneve" class="w-auto opacity-75" style="text-decoration:none; color: black;">@knyttneve</a>
                    </div>
                    <div class="rightlink w-auto opacity-75">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter ml" ></i>
                        <i class="fa-brands fa-instagram ml"></i>
                        <i class="fa-brands fa-linkedin-in ml"></i>
                    </div>
                </div>
            </div>
        </section>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    @yield('js')
</body>

</html>
