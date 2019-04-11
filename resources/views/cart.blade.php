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
                <div class="pull-left socialNw">
                    <i class="fa fa-ruble"></i><span style="font-weight: bold;">Рубль:</span> <span id="ruble" style="font-weight: bold;"></span>
                    <span class="icon-euro" style="font-weight: bold;">    </span><span id="euro" style="font-weight: bold;"></span>
                    <span class="icon-dollar" style="font-weight: bold;"></span> <span id="dollar" style="font-weight: bold;"></span>
                </div>
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
                        <li class=""><a href="https://sharij.net">Новости</a></li>

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
            <ul class="breadcrumb">
                <li><a href="/">Домашняя</a> <span class="divider">/</span></li>
                <li class="active">Корзина</li>
            </ul>
            <div class="well well-small">
                <h1>Корзина <small class="pull-right">@if($prodcount==1) {{$prodcount}} товар @else {{$prodcount}} товаров @endif в корзине </small></h1>
                <hr class="soften"/>

                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th>Товар</th>
                        <th>Описание</th>
                        <th>Доступно.</th>
                        <th>Цена(шт)</th>
                        <th>Количество </th>
                        <th>Итого по товару</th>
                    </tr>
                    </thead>
                    <tbody>
                    <script>var i =0;</script>
                    <?php $prod = []; $iter=0;?>
                    @foreach($products as $product)
                      <?php $prod[] = $product?>
                        @endforeach
                    <?php $prices = [];?>
                    @foreach($prod as $item)
                    @foreach($item as $i)
                        <?php $pr = 0;
                            $iter++;
                        ?>

                        @foreach($i->prices as $price)<?php  $pr=$price['price']; $prices[] = $price['price'];?> @endforeach
                    {{--{{var_dump($prod)}}--}}
                        <form class="form-horizontal" action="/checkout" method="post">
                    <tr>

                        <td><img width="100" src="{{URL::asset($i->product_img)}}" alt=""></td>
                        <td>{{$i->title}}<br><br></td>
                        <td><span class="shopBtn" style="vertical-align: center;text-align: center"><span class="icon-ok"></span></span> </td>
                        <td class="price">@foreach($i->prices as $price){{'$'.$price['price']}}@endforeach  </td>
                        <td>
                                <input type="hidden" value="1" class="qtyhid" name="cartqtyhid[]">
                                <input class="span1 cartqty" name="qty[{{$i->id}}]" style="width: 100px;"  size="16" type="number" min="1" max="{{$i->items_available}}" value="1" onchange="qtyproc()">

                            <a href="/deletefromcart/{{$iter}}" class="shopBtn">Удалить</a>
                        </td>
                        <td class="totalproduct">
                            @foreach($i->prices as $price){{'$'.$price['price']}}@endforeach

                        </td>
                    </tr>

@endforeach
                    @endforeach
                    <tr>
                        <td colspan="6" class="alignR">Итого:	</td>
                        <td id="totprod"> {{'$'.array_sum($prices)}}</td>
                    </tr>
                    </tbody>
                </table><br/>

                <table class="table table-bordered">
                    <tbody>
                    <tr><td>Оформление заказа:</td></tr>
                    <tr>
                        <td>

                                @csrf
                                <div class="control-group">
                                    <label class="span2 control-label" for="inputEmail">ФИО: </label>
                                    <div class="controls">
                                        <input type="text" placeholder="ФИО" name="fio" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="span2 control-label" for="inputEmail">Город: </label>
                                    <div class="controls">
                                        <input type="text" placeholder="Город" name="city" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="span2 control-label" for="inputEmail">Мобильный телефон: </label>
                                    <div class="controls">
                                        <input type="text" placeholder="Мобильный телефон" name="phone" required>
                                    </div>
                                </div>
                            <br>
                                <div class="control-group">
                                    <label class="span2 control-label" for="inputEmail">Эл.почта: </label>
                                    <div class="controls">
                                        <input type="text" placeholder="Эл.почта" name="email" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="span2 control-label" for="inputEmail">Номер отделения Новой Почты: </label>
                                    <div class="controls">
                                        <input type="text" placeholder="№ Новой Почты" name="npo" required>
                                    </div>
                                </div>
                            <br>
                                <div class="control-group">
                                    <label class="span2 control-label" for="inputEmail">Оплата: </label>
                                    <div class="controls">
                                        <select class="form-control" name="paymentmeth" id="exampleFormControlSelect1">
                                            <option value="Наложенный платеж">Наложеный платеж</option>
                                            <option value="Безналичный расчет">Безналичный расчет</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="submit" class="shopBtn" value="Заказ подтверждаю" name="submit">
                                    </div>
                                </div>

                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <a href="/products" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Продолжить покупки </a>
                @if(!auth()->check())
                <a href="/login" class="shopBtn btn-large" style="margin-left: 600px;">Войти</a>
                @endif


            </div>
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
        var dlr = document.getElementById('dollar');
        var eur = document.getElementById('euro');
        var rub = document.getElementById('ruble');

        dlr.innerText = (Math.round(resj[0].buy * 100) / 100)+'/'+(Math.round(resj[0].sale * 100) / 100);
        eur.innerText = (Math.round(resj[1].buy * 100) / 100)+'/'+(Math.round(resj[1].sale * 100) / 100);
        rub.innerText = (Math.round(resj[2].buy * 100) / 100)+'/'+(Math.round(resj[2].sale * 100) / 100);
    })
</script>
@extends('layouts.footer')
