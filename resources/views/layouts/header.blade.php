<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <script>

    </script>
    <link href="{{ URL::asset('css/bootstrap.css')}}" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet"/>
    <!-- font awesome styles -->
    <link href="{{ URL::asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <!--[if IE 7]>
    <link href="{{ URL::asset('css/font-awesome-ie7.min.css')}}" rel="stylesheet">
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="{{URL::asset('css/all.css')}}" rel="stylesheet">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ URL::asset('ico/favicon.ico')}}">
</head>
<body>

<!--
	Upper Header Section
-->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="topNav">
        <div class="container">
            <div class="alignR">
                <a class="pull-left socialNw">
                    <i class="fa fa-ruble"></i><span style="font-weight: bold;">Рубль:</span> <span id="ruble" style="font-weight: bold;"></span>
                    <span class="icon-euro" style="font-weight: bold;">    </span><span id="euro" style="font-weight: bold;"></span>
                    <span class="icon-dollar" style="font-weight: bold;"></span> <span id="dollar" style="font-weight: bold;"></span>
                </a>
                <a href="/"> <span class="icon-home"></span> Домашняя</a>
                @if(auth()->check())
                    <a class="" href="#"> <span class="icon-user" style="margin-right: 5px;"></span>{{auth()->user()->fname}}</a>

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="icon-user">{{ Auth::user()->name }} </span> <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Выйти') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                    <a class="" href="/account"> <span class="icon-user"></span> Мой аккаунт</a>
                @else
                    <a class="" href="#"> <span class="icon-user"></span> Мой аккаунт</a>
                    @if (Route::has('reg'))
                        <a href="{{ route('login') }}"><span class="icon-user">Войти</span> </a>
                    @endif


                    @if (Route::has('reg'))
                        <a href="{{route('reg')}}"><span class="icon-user">Зарегистрироваться</span>  </a>
                    @endif



                @endif



                <a href="contact.html"><span class="icon-envelope"></span> Контакты</a>
                <a href="/cart"><span class="icon-shopping-cart"></span> {{$prodcount}} Товар(ов)</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div id="gototop"></div>
    <header id="header">
        <div class="row">
            <div class="span4">
                <h1>
                    <a class="logo" href="/"><span>Магазин</span>
                        <img src="{{ URL::asset('img/logo-bootstrap-shoping-cart.png')}}" alt="Shop">
                    </a>
                </h1>
            </div>
            <div class="span4">

            </div>
            <div class="span4 alignR">
                <p><br> <strong> Поддержка (24/7) : <a href="tel:{{env('SUPP_PHONE')}}">{{env('SUPP_PHONE')}} </a></strong><br><br></p>

            </div>
        </div>
    </header>

    <!--
    Navigation Bar Section
    -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="active"><a href="/">Домашняя	</a></li>
                        <li class=""><a href="/products">Все товары</a></li>
                        <li class=""><a href="https://sharij.net">Новости</a></li>
                    </ul>
                    <form action="/search" class="navbar-search pull-left">
                        <input type="text" placeholder="Search" name="search" class="search-query span2">
                    </form>
                    <ul class="nav pull-right">

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--
    Body Section
    -->
    <div class="row">
        <div id="sidebar" class="span3">
            <div class="well well-small">
                <ul class="nav nav-list">
                    @foreach($categories as $category)
                        <li><a href="/category/{{$category->id}}"><span class="icon-chevron-right"></span>{{$category->title}}</a></li>
                    @endforeach
                    <li style="border:0"> </li>
                    <li><a class="totalInCart" href="/cart"></a>
                    </li>
                </ul>
            </div>

            <div class="well well-small alert alert-warning cntr">
                <h2>50% Скидка</h2>
                <p>
                    Только для онлайн заказов. <br><br><a class="defaultBtn" href="#">Нажми</a>
                </p>
            </div>
            <div class="well well-small"><a href="#"><img src="{{ URL::asset('img/paypal.jpg')}}"
                                                          alt="payment method paypal"></a></div>

            <a class="shopBtn btn-block" href="#">Товары на подходе<br>
            </a>
            <br>
            <br>
            <ul class="nav nav-list promowrapper">
                <?php $i=0;?>
                @foreach($products as $product)
                    @if($product->items_available==0&&$i<5)
                        <li>
                            <div class="thumbnail">
                                <a class="zoomTool" href="/product/{{$product->id}}" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                                <img src="{{ URL::asset($product->product_img)}}" alt="{{$product->title}}">
                                <div class="caption">
                                    <h4>{{$product->title}}</h4>
                                    <h4><a class="defaultBtn" href="/product/{{$product->id}}">VIEW</a> <span class="pull-right">@foreach($product->prices as $price){{'$'.$price['price']}}@endforeach</span></h4>
                                </div>
                            </div>
                        </li>
                        <li style="border:0"> &nbsp;</li>
                        <?php $i++; ?>
                    @endif
                @endforeach
            </ul>

        </div>
        <script>
            fetch('https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11').then(function (response) {

                return response.json();
            }).then(function (resj) {
                console.log(resj)
                var dlr = document.getElementById('dollar');
                var eur = document.getElementById('euro');
                var rub = document.getElementById('ruble');

                dlr.innerText = (Math.round(resj[0].buy * 100) / 100)+'/'+(Math.round(resj[0].sale * 100) / 100);
                eur.innerText = (Math.round(resj[1].buy * 100) / 100)+'/'+(Math.round(resj[1].sale * 100) / 100);
                rub.innerText = (Math.round(resj[2].buy * 100) / 100)+'/'+(Math.round(resj[2].sale * 100) / 100);
            })
        </script>
