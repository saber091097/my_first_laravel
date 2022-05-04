    @extends('template.template')

    @section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <style>
        .noimg{
            width: 80px !important;
            height: 80px;
            background-color: red;
            border-radius: 50%;
            color: white;
            font-size: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .eightimg{
            height: 200px;
            background-size: cover;
        }
    </style>
    @endsection


    @section('main')
        <section id="banner">
            <div class="container-fluid">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{asset('img/catA.jpeg')}}" alt="" style="width: 100%; height:100%;">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('img/catB.jpeg')}}" alt="" style="width: 100%; height:100%;">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('img/catC.jpeg')}}" alt="" style="width: 100%; height:100%;">
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <section id="intro">
            <div class="container-fluid ">
                <div class="row intro1box d-flex">
                    <h1>Raw Denim Heirloom Man Braid</h1>
                    <p class="rowinttext">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug.</p>
                    <div class="d-flex justify-content-center">
                        <div class="line"></div>
                    </div>
                </div>
                <div class="row">
                    @foreach ( $data2 as $news )
                    <div class="introbox1 d-flex flex-column align-items-center ">
                        @if ($news->img == "" || $news->img == null)
                            <div class="noimg" style="margin-bottom:20px">{{mb_substr($news->title,0,1,"utf-8")}}</div>
                        @else
                            <div class="introbox1-img">
                                <img src="{{$news->img}}" alt="">
                            </div>
                        @endif
                        <h5>{{$news->title}} </h5>
                        <p class="text">{{$news->content}}</p>
                        <span class="text-primary mt">Learn{{$news->content}} More<i class="fa-solid fa-arrow-right ms"></i></span>
                    </div>
                    @endforeach

                </div>
                <div class="row">
                    <button class="text-white d-flex justify-content-center align-items-center border-0">Button</button>
                </div>
            </div>
        </section>
        <section id="gallery">
            <div class="container-fluid">
                <div class="row d-flex mb flex-md-column">
                    <h1 class="col-4 col-md-12">Master Cleanse Reliac Heirloom</h1>
                    <p class="col-8 col-md-12">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom.</p>
                </div>
                <div class="row">
                    <div class="leftgallery d-flex flex-column w-50">
                        <div class="leftgallery-top d-flex h-auto " style="margin: 0;">
                            <img src="./img/500x300.png" alt="" class="leftgallery-top-left w-50 border-white">
                            <img src="./img/501x301.png" alt="" class="leftgallery-top-left w-50 border-white">
                        </div>
                        <img src="./img/600x360.png" alt="" class="leftgallery-bottom w-100 ">
                    </div>
                    <div class="rightgallery w-50 d-flex flex-column ">
                        <img src="./img/601x361.png" alt="" class="rightgallery-top w-100 border-white">
                        <div class="rightgallery-bottom d-flex w-100">
                            <img src="./img/502x302.png" alt="rightgallery-bottom-left " class="rightgallery-bottom-left w-50">
                            <img src="./img/503x303.png" alt="rightgallery-bottom-right" class="rightgallery-bottom-right w-50">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="pricing">
            <div class="container-xxl d-flex flex-column h-auto ">
                <div class="row d-flex justify-content-center">
                    <h1 class="pricing-h1 d-flex justify-content-center">Pricing</h1>
                    <p class="pric-p d-flex justify-content-center p-0 text-center">Banh mi cornhole echo park skateboard authentic crucifix neutra tilde lyft biodiesel artisan direct trade mumblecore 3 wolf moon twee</p>
                </div>
                <div class="row d-flex justify-content-center m-0">
                    <table class="pricing-table table-secondary">
                        <thead class="">
                            <tr class="tabbr d-flex">
                                <th class="thpad w-25 fw2">Plan</th>
                                <th class="thpad w-25 fw2">Speed</th>
                                <th class="thpad w-25 fw2">Storage</th>
                                <th class="thpad w-25 fw2">Price</th>
                                <th class="inputbox"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="d-flex ">
                                <td class="tdb w-25 ">Start</td>
                                <td class="tdb w-25 ">5 Mb/s</td>
                                <td class="tdb w-25 ">15 GB</td>
                                <td class="tdb w-25 ">Free</td>
                                <td class="inputbox d-flex justify-content-end align-items-center ">
                                    <input type="radio" name="" id="">
                                </td>
                            </tr>
                            <tr class="d-flex ">
                                <td class="tdb w-25 ">Pro</td>
                                <td class="tdb w-25 ">25 Mb/s</td>
                                <td class="tdb w-25 ">25 GB</td>
                                <td class="tdb w-25 ">$24</td>
                                <td class="inputbox d-flex justify-content-end align-items-center ">
                                    <input type="radio" name="" id="">
                                </td>
                            </tr>
                            <tr class="d-flex ">
                                <td class="tdb w-25 ">Business</td>
                                <td class="tdb w-25 ">36 Mb/s</td>
                                <td class="tdb w-25 ">40 GB</td>
                                <td class="tdb w-25 ">$50</td>
                                <td class="inputbox d-flex justify-content-end align-items-center ">
                                    <input type="radio" name="" id="">
                                </td>
                            </tr>
                            <tr class="d-flex ">
                                <td class="tdb w-25 ">Exclusive</td>
                                <td class="tdb w-25 ">48 Mb/s</td>
                                <td class="tdb w-25 ">120 GB</td>
                                <td class="tdb w-25 ">$72</td>
                                <td class="inputbox d-flex justify-content-end align-items-center ">
                                    <input type="radio" name="" id="">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row m-0 mr d-flex justify-content-center">
                    <div class="pricing-bottom w-75 d-flex justify-content-between">
                        <span class="pricing-span d-flex justify-content-center align-items-center text-primary">Learn More<i class="fa-solid fa-arrow-right ms"></i></span>
                        <button class="text-white d-flex justify-content-center align-items-center border-0">Button</button>
                    </div>
                </div>
            </div>
        </section>
        <section id="card01">
            <div class="container-fluid">
                <div class="row flex-md-column md">
                    <div class="card01-top-left col-6 d-flex flex-column col-md-12 col-sm-12">
                        <h1 class="fs ">Pitchfork Kickstarter Taxidermy</h1>
                        <div class="line"></div>
                    </div>
                    <div class="card01-top-right col-6 text-break col-md-12 col-sm-12">
                        <span>Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="cards d-flex w-100 flex-md-wrap justify-content-md-between flex-sm-wrap">
                        <div class="card h-auto d-flex flex-column justify-content-center ms w-25w-25">
                            <div class="card-pic d-flex justify-content-center align-items-center">
                                <img src="./img/720x400.png" alt="">
                            </div>
                            <h3 class="fs text-primary ">SUBTITLE</h3>
                            <h2 class="fs2 p16">Chichen Itza</h2>
                            <span>Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</span>
                        </div>

                        <div class="card w-25 h-auto d-flex flex-column justify-content-center rwd">
                            <div class="card-pic d-flex justify-content-center align-items-center">
                                <img src="./img/721x401.png" alt="">
                            </div>
                            <h3 class="fs text-primary">SUBTITLE</h3>
                            <h2 class="fs2 p16">Colosseum Roma</h2>
                            <span>Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</span>
                        </div>

                        <div class="card w-25 h-auto d-flex flex-column justify-content-center rwd">
                            <div class="card-pic d-flex justify-content-center align-items-center">
                                <img src="./img/722x402.png" alt="">
                            </div>
                            <h3 class="fs text-primary">SUBTITLE</h3>
                            <h2 class="fs2 p16">Great Pyramid of Giza</h2>
                            <span>Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</span>
                        </div>

                        <div class="card w-25 h-auto d-flex flex-column justify-content-center mr">
                            <div class="card-pic d-flex justify-content-center align-items-center">
                                <img src="./img/723x403.png" alt="">
                            </div>
                            <h3 class="fs text-primary">SUBTITLE</h3>
                            <h2 class="fs2 p16">San Francisco</h2>
                            <span>Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="special">
            <div class="container-xxl d-flex flex-column ">
                <div class="row d-flex justify-content-center justify-content-sm-around">
                    <div class="row-left w-auto">
                        <div class="special-img">
                        <img src="./img/catA.jpeg" alt="">
                        </div>
                    </div>
                    <div class="row-right d-flex flex-column p-0 justify-content-ajustify-content-sm-around">
                        <h2 class="mb">Shooting Stars</h2>
                        <span class="row-right-span">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</span>
                        <span class="special-span d-flex text-primary">Learn More<i class="fa-solid fa-arrow-right ms"></i></span>
                    </div>
                </div>
                <div class="row d-flex justify-content-center pt">
                    <div class="row-left ">
                        <h2 class="mb">The Catalyzer</h2>
                        <span class="row2-right-span">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</span>
                        <span class="special-span d-flex text-primary">Learn More<i class="fa-solid fa-arrow-right ms"></i></span>
                    </div>
                    <div class="row2-right d-flex flex-column p-0 justify-content-ajustify-content-sm-around w-auto">
                        <div class="special-img">
                            <img src="./img/catB.jpeg" alt="">
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center pt">
                    <div class="row-left w-auto">
                        <div class="special-img">
                        <img src="./img/catC.jpeg" alt="">
                        </div>
                    </div>
                    <div class="row-right d-flex flex-column p-0 justify-content-between ">
                        <h2 class="mb">The 400 Blows</h2>
                        <span class="row-right-span">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</span>
                        <span class="special-span d-flex text-primary">Learn More<i class="fa-solid fa-arrow-right ms"></i></span>
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center button">
                    <button class="text-white d-flex justify-content-center align-items-center border-0">Button</button>
                </div>
            </div>
        </section>
        <section id="merch">
            <div class="container-xxl col-12 d-flex flex-md-row flex-lg-row flex-sm-column flex-md-wrap">
                @foreach ($main_product as $main)
                <div class="row col-6 d-flex col-md-6 col-md-12 col-sm-12">
                    <img src="{{$main->img_path}}" alt="" class="w-100 h-auto">
                </div>
                <div class="row col-6 right d-flex flex-column col-md-6 col-md-12  col-sm-12">
                    <h3 class="">BRAND NAME</h3>
                    <h2>{{$main->name}}</h2>
                    <div class="star d-flex align-items-center">
                        <div class="line d-flex align-items-center">
                            <span class="mr1"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star mr1"></i>4 Reviews</span>
                        </div>
                        <span class="mr d-flex"><i class="fa-brands fa-facebook-f w20 d-flex align-items-center justify-content-center"></i><i class="fa-brands fa-twitter w20 d-flex align-items-center justify-content-center"></i><i class="fa-solid fa-comment w20 d-flex align-items-center justify-content-center"></i></span>
                    </div>
                    <span class="mainp">{{$main->introduce}}</span>
                    <div class="color d-flex align-items-center">
                        <span class="colorp">Color</span>
                        <button class="rounded1"></button>
                        <button class="rounded2 ml"></button>
                        <button class="rounded3 ml"></button>
                        <span class="mrg">Size</span>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>SM</option>
                            <option value="1">M</option>
                            <option value="2">L</option>
                            <option value="3">XL</option>
                        </select>
                    </div>
                    <div class="pay d-flex">
                        <span class="money">${{$main->price}}</span>
                        <button class="text-white d-flex justify-content-center align-items-center border-0 paybutton">Button</button>
                        <div class="love d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-heart d-flex justify-content-center align-items-center opacity-50"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        <section id="card02">
            <div class="container-fluid">
                <div class="row d-flex ">
                    @foreach ($product_data as $data)
                    <a href="/shop/product/{{$data->id}}" class="card w-25" style="text-decoration: unset; color:black;">
                        <img src="{{$data->img_path}}" alt="" class="eightimg">
                        <h3 class="mt">CATEGORY</h3>
                        <h2 class="fs">{{$data->name}}</h2>
                        <span class="mts">${{$data->price}}</span>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
        <section id="map">
            <div class="container-fluid">
                <div class="row">
                    <iframe style="filter: grayscale(1) contrast(1.2) opacity(0.4);" src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d50012.2825105508!2d27.142826!3d38.423734!3m2!1i1024!2i768!4f13.1!4m8!3e0!4m0!4m5!1s0x14bbd862a762cacd%3A0x628cbba1a59ce8fe!2z5LyK5aOr6bqlIOWcn-iAs-WFtuS8iuiMsuWvhueIvuecgQ!3m2!1d38.423733999999996!2d27.142826!5e0!3m2!1sen!2stw!4v1649590097251!5m2!1sen!2stw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <div class="freeback bg-white d-flex flex-column h-auto shadow p-3 mb-5 bg-body rounded">
                        <h2 class="fe">Feedback</h2>
                        <span class="po">Post-ironic portland shabby chic echo park, banjo fashion axe</span>
                        <span class="em">Email</span>
                        <input type="text" class="fontbox">
                        <span class="em">Message</span>
                        <textarea name="" id="ro6" cols="30" rows="7"></textarea>
                        <button class="text-light">Button</button>
                        <span class="mb">Chicharrones blog helvetica normcore iceland tousled brook viral artisan.</span>
                    </div>
                </div>
            </div>
        </section>
    @endsection
    <footer>


   @section('js')
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            cssMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            mousewheel: true,
            keyboard: true,
        });
    </script>
    @endsection

