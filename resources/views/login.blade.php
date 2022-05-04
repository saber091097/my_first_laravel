<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <main>
        <div class="container-fluid d-flex h-100 w-100" style="background-image: url(./img/1920x1080.png) ;">
            <div class="abs bg-black w-100 h-100 d-flex">
            </div>
            <div class="row col-6 text-white position-relative left">
                <div class="textboard">
                    <h2 class="fs">Keep it special</h2>
                    <h3 class="fs3">Capture your personal memory in unique way, anywhere.</h3>
                </div>
                <div class="link position-absolute bottom-0 d-flex justify-content-center align-items-center">
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-facebook-f mar"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>
            </div>
            <div class="row col-6 text-white  d-flex h-100 md">
                <div class="bgb">
                    <div class="loginpd h-100 position-relative">
                        <div class="loginbox w-100 h-auto position-absolute top-50">
                            <div class="name d-flex justify-content-center">
                                <span>數位方塊</span>
                            </div>
                            <div class="fans d-flex justify-content-center">
                                <div class="fansbox d-flex justify-content-center align-items-center"><i
                                        class="fa-brands fa-facebook-f"></i></div>
                                <div class="fansbox d-flex justify-content-center align-items-center cenicon"><i
                                        class="fa-brands fa-google-plus-g"></i></div>
                                <div class="fansbox d-flex justify-content-center align-items-center"><i
                                        class="fa-brands fa-linkedin-in"></i></div>
                            </div>
                            <div class="word d-flex justify-content-center">
                                <span>or use email your account</span>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="finbox d-flex flex-column justify-content-center w-100">
                                    <div class="div d-flex justify-content-center">
                                        <input type="text"
                                            class="email text-white bg-black d-flex justify-content-center"
                                            placeholder="Email" name="email">
                                    </div>
                                    <div class="div1 d-flex justify-content-center">
                                        <input type="password"
                                            class="pos text-white bg-black d-flex justify-content-center"
                                            placeholder="Password" name='password'>
                                    </div>

                                    <div class="refobtn d-flex justify-content-between" style="padding:0 5%">
                                        <div class="left w-50 " style="padding-left: 12%;">
                                            <input id="remember_me" type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            name="remember">
                                            <span class="ml-2 text-sm text-gray-600">{{ __('記住我') }}</span>
                                        </div>
                                        <div class="forgot position-relative right w-50 " style="font-size: .857rem">
                                            <span class="position-absolute">Forgot your password?</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <a href="/register">註冊帳號</a>
                                    </div>
                                    <div class="but d-flex justify-content-center">
                                        <button type="submit" class="signbutton rounded-pill">SIGN IN</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

</body>

</html>
