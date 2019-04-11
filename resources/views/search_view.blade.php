@include('layouts.header')

<!--
Lower Header Section
-->

        <div class="span9">
            <!--
            New Products
            -->
            <div class="well well-small">
                <h3>Our Products </h3>
                <?php $i = 0;?>

                <div class="row-fluid">
                    <ul class="thumbnails">
                        @foreach($prod as $product)
                            <?php $i++?>



                            <li class="span4">
                                <div class="thumbnail">
                                    <a href="/product/{{$product->id}}" class="overlay"></a>
                                    <a class="zoomTool" href="/product/{{$product->id}}" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                                    <a href="/product/{{$product->id}}"><img src="{{URL::asset($product->product_img)}}" alt=""></a>
                                    <div class="caption cntr">
                                        <p>{{$product->title}}</p>
                                        <p><strong> @foreach($product->prices as $price){{$price['price']}}@endforeach</strong></p>
                                        <h4>@if($product->items_available==0) <a class="shopBtn" href="#" title=""> NOT AVAILABLE </a>@else<a class="shopBtn" href="#" title="add to cart">Add to cart</a> @endif</h4>
                                        <div class="actionList">
                                        </div>
                                        <br class="clr">
                                    </div>
                                </div>
                            </li>




                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--
    Clients
    -->
    <section class="our_client">
        <hr class="soften"/>
        <h4 class="title cntr"><span class="text">Manufactures</span></h4>
        <hr class="soften"/>
        <div class="row">
            <?php $i =0;
            $imgs = [];
            $manufacturer = [];
            ?>
            @foreach($products as $product)
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

@extends('layouts.footer')