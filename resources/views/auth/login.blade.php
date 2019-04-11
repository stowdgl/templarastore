


@include('layouts.header')
<!--
Lower Header Section
-->

        <div class="span9">
            <ul class="breadcrumb">
                <li><a href="/">Домашняя</a> <span class="divider">/</span></li>
                <li class="active">{{ __('Войти') }}</li>
            </ul>
            <h3> {{ __('Войти') }}</h3>
            <hr class="soft"/>

            <div class="row" >
                <div class="span4">
                    <div class="well">
                        <h5>Создать аккаунт</h5><br/>
                        <a href="/register">Создать</a>
                    </div>
                </div>
                <div class="span1"> &nbsp;</div>
                <div class="span4">
                    <div class="well">
                        @if($errors->any())
                            <h4>{{$errors->first()}}</h4>
                        @endif
                        <h5>Уже зарегистрированы ?</h5>
                        <form action="{{route('doLogin')}}" method="post">
                            @csrf
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Email</label>
                                <div class="controls">
                                    <input class="span3"  type="text" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Пароль</label>
                                <div class="controls">
                                    <input type="password" class="span3" placeholder="Password" name="pword">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Забыли пароль?') }}
                                        </a>
                                    @endif
                                    <button type="submit" class="defaultBtn">Войти</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--
    Clients
    -->
    <section class="our_client">
        <hr class="soften"/>
        <h4 class="title cntr"><span class="text">Бренд</span></h4>
        <hr class="soften"/>
        <div class="row">
            <?php $i =0;
            $imgs = [];
            $manufacturer = [];
            ?>
            @foreach($allproducts as $product)
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

                    <form action="/product/{{lcfirst($manufacturer[$j])}}" method="post">
                        @csrf


                        <button type="submit" style="border:none;"><img alt="" src="{{ URL::asset($img)}}" style="width: 100%"></button>
                    </form>
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

<div class="copyright">
    <div class="container">
        <p class="pull-right">
            <a href="#"><img src="{{ URL::asset('img/maestro.png')}}" alt="payment"></a>
            <a href="#"><img src="{{ URL::asset('img/mc.png')}}" alt="payment"></a>
            <a href="#"><img src="{{ URL::asset('img/pp.png')}}" alt="payment"></a>
            <a href="#"><img src="{{ URL::asset('img/visa.png')}}" alt="payment"></a>
            <a href="#"><img src="{{ URL::asset('img/disc.png')}}" alt="payment"></a>
        </p>
        <span>Copyright &copy; 2013<br> bootstrap ecommerce shopping template</span>
    </div>
</div>
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ URL::asset('js/jquery.js')}}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{ URL::asset('js/jquery.scrollTo-1.4.3.1-min.js')}}"></script>
<script src="{{ URL::asset('js/shop.js')}}"></script>
</body>
</html>
