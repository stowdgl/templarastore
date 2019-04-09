<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ URL::asset('css/bootstrap4.css')}}" rel="stylesheet"/>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6" style="border-right: 1px solid #a39d9d">
            <h3>
                Добавить товар
            </h3>
            <form role="form" action="/dashboard/createprod" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Категория: </label>
                    <select class="form-control" id="categories" name="categories" required>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">

                    <label for="exampleInputEmail1">
                       Название
                    </label>
                    <input type="text" class="form-control" id="title" name="title" required/>
                </div>
                <div class="form-group">

                    <label for="exampleInputEmail1">
                        Код товара
                    </label>
                    <input type="text" class="form-control" id="code" name="code" required/>
                </div>
                <div class="form-group">

                    <label for="specifications">
                        Характеристики
                    </label>
                    <input type="text" class="form-control" id="specifications" name="specifications" required/>
                </div>
                <div class="form-group">

                    <label for="manufacturer">
                        Производитель
                    </label>
                    <input type="text" class="form-control" id="manufacturer" name="manufacturer" required/>
                </div>
                <label for="validatedCustomFile1">Изображение производителя</label>
                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="validatedCustomFile1" name="manufacturerimg" onchange="$('#lbltext1').html(this.files[0].name)" required>
                    <label class="custom-file-label" for="validatedCustomFile1" id="lbltext1">Выбрать изображение производителя...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>

                <label for="validatedCustomFile1">Изображение товара</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile2" name="productimg" onchange="$('#lbltext2').html(this.files[0].name)" required>
                    <label class="custom-file-label" for="validatedCustomFile2" id="lbltext2">Выбрать изображение товара...</label>
                    <div class="valid-feedback">Example invalid custom file feedback</div>
                </div>
                <div class="form-group">

                    <label for="itemsavailable">
                        Количество товара
                    </label>
                    <input type="text" class="form-control" id="itemsavailable" name="itemsavailable" required/>
                </div>
                <div class="form-group">

                    <label for="price">
                        Цена(без знака $)
                    </label>
                    <input type="text" class="form-control" id="price" name="price" required/>
                </div>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>
        <div class="col-md-6" >
            <h3>
                Добавить категорию
            </h3>
            <form role="form" action="/dashboard/createcat" method="post">
                @csrf
                <div class="form-group">

                    <label for="title">
                        Название
                    </label>
                    <input type="text" class="form-control" id="title" name="title" required/>
                </div>
                <div class="form-group">

                    <label for="code">
                        Родитель(опционально)
                    </label>
                    <input type="text" class="form-control" id="code" name="parent_id" />
                </div>

                <button type="submit" class="btn btn-primary">
                    Добавить
                </button>
            </form>
        </div>
    </div>
</div>
<br><br><br>

<table class="table table-hover">
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
        <th scope="col">Статус заказа</th>
        <th scope="col">Обработать</th>
    </tr>
    </thead>
    <tbody>
    <?php $prices1 = []; $idsprices = []; $prodids=[];$prodprices=[]; $prodpricesids=[];?>
    @foreach($prices as $price)
        @foreach($price as $pr)
        <?php $prices1[] = $pr->price;
        $idsprices[]= $pr->product_id;
        ?>
    @endforeach
    @endforeach
    @foreach($orders as $order)
        @foreach($order->products as $prod)<?php $prodids[]=$prod->id?>@endforeach
        @foreach($order->products as $prod)@foreach($prod->prices as $pric) <?php $prodprices[] = $pric->price; $prodpricesids[]=$prod->id; ?>@endforeach @endforeach
        <?php
        $prodpricesids = array_unique($prodpricesids);
        $prodprices = array_unique($prodprices);
        $prodpricesids = array_values($prodpricesids);
        $prodprices = array_values($prodprices);
        ?>

    <tr class="type-color">
        <th scope="row">{{$order->id}}</th>
        <td>{{$order->fio}}</td>
        <td>{{$order->email}}</td>
        <td>{{$order->city}}</td>
        <td>{{$order->phone}}</td>
        <td>{{$order->npo}}</td>
        <td>{{$order->paymentmeth}}</td>
        <td>{{$order->created_at}}</td>
    <?php $prodidsc = array_count_values($prodids); $c =0; $prodidsck = array_keys($prodidsc);?>
        <td>@foreach(array_unique($prodids) as $prods)<a href="/product/{{$prods}}">{{$prods.' '}}@endforeach</a></td>
        <td>@foreach(array_unique($prodids) as $prods)<span class="qtyprod">{{$prodidsc[$prodidsck[$c]]}}</span> <?php $c++?>@endforeach</td>
<?php $prc = 0;?>
        <td> @for($j = 0;$j<count($prodpricesids);$j++){{"(".$prodpricesids[$j].")".$prodprices[$j]}} @endfor </td>
        <td class="ordstat">{{$order->order_status}}</td>
        <td>
            <form action="/dashboard/order/{{$order->id}}" method="post">
                @csrf
                <div class="form-group">
                    @foreach($order->products as $prod)
                    <input type="hidden" value="{{$prod->id}}" name="ids[{{$prod->id}}]">
                    @endforeach
                    <select name="proc" class="form-control" id="sel1">
                        <option>-</option>
                        <option value="1">Обработано</option>
                        <option value="2">Отменить</option>
                    </select>
                <button type="submit" class="btn btn-warning">Подтвердить</button>
                </div>
            </form>
        </td>
    </tr>
        @endforeach
    </tbody>
</table>
<br><br><br>
<hr>
<div style="margin-bottom: 100px; border-top: 4px solid red;"></div>
<hr>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Категория</th>
        <th scope="col">Название</th>
        <th scope="col">Код</th>
        <th scope="col">Характеристики</th>
        <th scope="col">Производитель</th>
        <th scope="col">Изображение производителя</th>
        <th scope="col">Изображение товара</th>
        <th scope="col">Количество товара</th>
        <th scope="col">Цена</th>
        <th scope="col">Создано</th>
        <th scope="col">Редактировано</th>
        <th scope="col">Управление</th>
        <th scope="col"></th>

    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
    <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->categories[0]->title}}</td>
        <td>{{$product->title}}</td>
        <td>{{$product->code}}</td>
        <td>{{$product->specifications}}</td>
        <td>{{$product->manufacturer}}</td>
        <td>{{$product->manufacturer_img}}</td>
        <td>{{$product->product_img}}</td>
        <td>{{$product->items_available}}</td>
        <td>{{'$'.@$product->prices[0]->price}}</td>
        <td>{{$product->created_at}}</td>
        <td>{{$product->updated_at}}</td>
        <td><a href="/dashboard/delete/{{$product->id}}" class="btn btn-danger">Удалить</a></td>
        <td><a href="/dashboard/modify/{{$product->id}}" class="btn btn-warning">Изменить</a></td>
    </tr>
    @endforeach
    <tr>{{$products->links()}}</tr>
    </tbody>
</table>

<script src="{{ URL::asset('js/jquery-3.3.1.js')}}"></script>
<script src="{{ URL::asset('js/bootstrap4.js')}}"></script>
<script>
    document.addEventListener("DOMContentLoaded", ready);
    function ready() {
        var table = document.getElementsByClassName('ordstat');
        var tr = document.getElementsByClassName('type-color');
console.log(tr);
        for (var i = 0; i < table.length; i++) {
            console.log(table[i]);
            if (table[i].innerText === 'Обработан') {
                console.log(i, tr[i], i);
                table[i].parentElement.setAttribute('class', 'table-success');

            }
            if (table[i].innerText === 'Ожидает обработки') {
                console.log(i, tr[i]);
                table[i].parentElement.setAttribute('class', 'table-info');
            }
            if (table[i].innerText === 'Отменён') {
                console.log(3, tr[i]);
                table[i].parentElement.setAttribute('class', 'table-danger');
            }
        }
        var qtys = document.getElementsByClassName('qtyprod');

    }
</script>
</body>
</html>
<?php
?>
