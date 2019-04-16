<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Store">
    <meta name="author" content="stowdgl&neoncas">
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

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ URL::asset('ico/favicon.ico')}}">
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
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
                    <span class="icon-dollar" style="font-weight: bold;"></span> <span id="dollar" style="display: none;font-weight: bold;"></span><span id="dollar1" style="font-weight: bold;"></span>
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



<!--
Lower Header Section
-->
<div class="container">
    <div id="gototop"> </div>
    <header id="header">
        <div class="row">
            <div class="span4">
                <h1>
                    <a class="logo" href="/"><span>Магазин</span>
                        <img src="{{URL::asset('img/logo-bootstrap-shoping-cart.png')}}" alt="Shop">
                    </a>
                </h1>
            </div>
            <div class="span4">

            </div>
            <div class="span4 alignR">
                <p><br> <strong> Поддержка (24/7) :  <a href="tel:{{env('SUPP_PHONE')}}">{{env('SUPP_PHONE')}} </a></strong><br><br></p>
                <span class="btn btn-warning btn-mini">$</span>
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
                        <li class=""><a href="/">Домашняя	</a></li>
                        <li class=""><a href="/products">Все товары</a></li>
                        <li class=""><a href="https://sharij.net" target="_blank">Новости</a></li>

                    </ul>
                    <form action="#" class="navbar-search pull-left" style="padding-top: 5px; margin-right: 10px;float: right;">
                        <input type="text" placeholder="Search" class="search-query span2">
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
        <div class="span12">
    <table class="table table-bordered table-condensed" style="border-right: 1px solid black;">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">ФИО</th>
            <th scope="col">E-mail</th>
            <th scope="col">Город</th>
            <th scope="col">Номер телефона</th>
            <th scope="col">Номер почты</th>
            <th scope="col">Способ оплаты</th>
            <th scope="col">Заказ создан</th>
            <th scope="col">Товары</th>
            <th scope="col">Количество</th>
            <th scope="col">Цена</th>
            <th scope="col">Сумма заказа</th>
            <th scope="col">Статус заказа</th>
        </tr>
        </thead>
        <tbody>
        <?php $flag = true;?>
        @foreach($orders as $order)

                @foreach($order->users as $users)
                @if($users->id == auth()->user()->id)  {{-- если юзер в промежуточной таблице равен нынешнему юзеру, то показываем инфу--}}


                <tr >
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->fio}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->city}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->npo}}</td>
                    <td>{{$order->paymentmeth}}</td>
                    <td>{{$order->created_at}}</td>
                    <?php
                    $productsTitles = []; // пустой массив для названий товаров
                    $productsIDs = []; // пустой массив для ID товаров
                    $productsPrices = []; // пустой массив для цен товаров
                    ?>
                    @foreach($order->products as $products)
                        <?php
                        $productsTitles[]=$products->title; // заполняем массив названиями товаров
                        $productsIDs[] = $products->id; // заполняем массиив ID товаров
                        ?>
                        @foreach($products->prices as $prices)
                            <?php
                            $productsPrices[] = $prices->price; // заполняем массив ценами товаров
                            ?>
                        @endforeach
                    @endforeach
                    <?php
                    $i = 0; // создаем итератор для ID товаров
                    ?>
                    <td> @foreach(array_values(array_unique($productsTitles)) as $productTitle)
                            <a href="/product/{{$productsIDs[$i]}}">{{($i+1).') '.$productTitle }}</a> <!-- показываем товары и ссылки на них  -->
                            <?php $i++;?>
                        @endforeach </td>
                    <td>
                        @foreach(array_count_values($productsTitles) as $title=>$productQuantity)
                            {{$productQuantity }} <!-- показываем количество заказанного товара-->
                        @endforeach
                    </td>
                    <td>
                        @foreach(array_values(array_unique($productsPrices)) as $prices)
                            {{'$'.$prices }} <!-- показываем цены за ЕДИНИЦУ товара-->
                        @endforeach
                    </td>
                    <?php
                    $i = 0;
                    $pricePerItem = [];
                    ?>
                    @foreach(array_values(array_unique($productsPrices)) as $qty)
                        <?php
                        $pricePerItem[] = $qty*array_values(array_count_values($productsTitles))[$i];
                        ?>
                        <?php $i++;?>
                    @endforeach
                    <td>
                        {{'$'.array_sum($pricePerItem)}} <!-- показываем итоговую цену заказа-->
                    </td>
                    <td>{{$order->order_status}}</td>
                </tr>

                    @endif
                @endforeach

            @endforeach
        </tbody>
    </table>
        </div>
    </div>
    <!--
    Clients
    -->
    <section class="our_client">
        <hr class="soften"/>
        <h4 class="title cntr"><span class="text">Бренды</span></h4>
        <hr class="soften"/>
        <div class="row">
            <?php $i =0;
            $imgs = [];
            $manufacturer = [];
            ?>
            @foreach($products1 as $product)
                <?php
                $imgs[] = $product->manufacturer_img;
                $manufacturer[] = $product->manufacturer;
                ?>
            @endforeach
            <?php
            $imgs = array_unique($imgs);
            // $imgs = array_values($manufacturer);
            $manufacturer = array_unique($manufacturer);
            $manufacturer = array_values($manufacturer);
            $i=0; $j=0; $m = count($imgs)?>
            @foreach($imgs as $img)
                @if($i>6)
                    @break;
                @endif
                <div class="span2">

                    <a href="/product/{{lcfirst($manufacturer[$j])}}"><img alt="" src="{{ URL::asset($img)}}" style="width: 100px"></a>
                </div>
                <?php $i++; $j++;?>
            @endforeach
        </div>
    </section>

    <!--
    Footer
    -->
    <footer class="footer">
        <div class="row-fluid">
            <div class="span2">
                <h5>Your Account</h5>
                <a href="#">YOUR ACCOUNT</a><br>
                <a href="#">PERSONAL INFORMATION</a><br>
                <a href="#">ADDRESSES</a><br>
                <a href="#">DISCOUNT</a><br>
                <a href="#">ORDER HISTORY</a><br>
            </div>
            <div class="span2">
                <h5>Iinformation</h5>
                <a href="contact.html">CONTACT</a><br>
                <a href="#">SITEMAP</a><br>
                <a href="#">LEGAL NOTICE</a><br>
                <a href="#">TERMS AND CONDITIONS</a><br>
                <a href="#">ABOUT US</a><br>
            </div>
            <div class="span2">
                <h5>Our Offer</h5>
                <a href="#">NEW PRODUCTS</a> <br>
                <a href="#">TOP SELLERS</a><br>
                <a href="#">SPECIALS</a><br>
                <a href="#">MANUFACTURERS</a><br>
                <a href="#">SUPPLIERS</a> <br/>
            </div>
            <div class="span6">
                <h5>The standard chunk of Lorem</h5>
                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for
                those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et
                Malorum" by Cicero are also reproduced in their exact original form,
                accompanied by English versions from the 1914 translation by H. Rackham.
            </div>
        </div>
    </footer>
</div><!-- /container -->
<script src="js/cart.js">

</script>
<script>
    fetch('https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11').then(function (response) {

        return response.json();
    }).then(function (resj) {
        console.log(resj)
        var dlr1 = document.getElementById('dollar1');
        var eur = document.getElementById('euro');
        var rub = document.getElementById('ruble');
        var dollar = document.getElementById('dollar');
        dlr1.innerText = (Math.round(resj[0].buy * 100) / 100)+'/'+(Math.round(resj[0].sale * 100) / 100);
        dollar.innerText=parseFloat(Math.round(resj[0].buy * 100) / 100);
        eur.innerText = (Math.round(resj[1].buy * 100) / 100)+'/'+(Math.round(resj[1].sale * 100) / 100);
        rub.innerText = (Math.round(resj[2].buy * 100) / 100)+'/'+(Math.round(resj[2].sale * 100) / 100);
        /* var totprod = document.getElementById('totprod');
         var amount = document.getElementById('amount');
         amount.setAttribute('value', (parseFloat(dollar.innerText)*parseFloat(totprod.innerText)));*/
    })


    valueAmount();
    //document.addEventListener("DOMContentLoaded", valueAmount);
    function valueAmount(){
        var dollar = document.getElementById('dollar');
        console.log(dollar.innerText);

    }

</script>
@extends('layouts.footer')

