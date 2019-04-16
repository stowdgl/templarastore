<?php

namespace App\Http\Controllers;

use App\Products;
use App\Orders;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request){
        //$cart = $request->session()->forget('cart');
        $request->session()->push('cart', [$request['qty'] => $request['id']]);
       // $cart = $request->session()->get('cart');

       return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $cart = $request->session()->get('cart');
        //$cart1 = var_dump($cart);
        //var_dump($cart);
        $products = [];
        if (isset($cart)) {
            foreach ($cart as $key=>$item) {
                $products[] = Products::with('categories', 'prices')->where('id', $item)->get();
            }
        }
        $prodcount= count($products);
        $products1= Products::with('categories','prices')->orderBy('created_at')->get();

        return view('cart',['cart'=>$cart,'products'=>$products,'prodcount'=>$prodcount,'products1'=>$products1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // return view('test',['req'=>file_get_contents("php://input")]);
        $cart = $request->session()->get('cart');


        //return view('test',['qty'=>$cart]);
        // array(2) { qty[0]=> string(1) id"4" [1]=> string(1) "1" }

      //  return view('test',['qty'=>$request['qty']]);
       // array(2) { id[4]=> string(1) qty"2" [1]=> string(1) "1" }
       $this->validate(request(),[
            'fio'=>'required',
            'city'=>'required',
            'email'=>'required|email',
            'npo'=>'required',
            'phone'=>'required',
            'paymentmeth'=>'required'
        ]);
        $fio=htmlspecialchars($request['fio']);
        $city=htmlspecialchars($request['city']);
        $email=htmlspecialchars($request['email']);
        $npo=htmlspecialchars($request['npo']);
        $phone=htmlspecialchars($request['phone']);
        $paymenmeth=htmlspecialchars($request['paymentmeth']);
        $order = Orders::create([
            'fio'=>$fio,
            'email'=> $email,
            'city'=>$city,
            'phone'=>$phone,
            'npo'=>$npo,
            'paymentmeth'=>$paymenmeth
        ]);

        $orders = Orders::where('id',$order['id'])->first();

        foreach ($request['qty'] as $key=>$item) {
            for ($j = 0; $j<$item;$j++){
                $orders->products()->attach($key);
            }
//,['product_qty'=>$item]
        }
        if (auth()->check()){
            $orders->users()->attach(auth()->user()->id);
        }


       $request->session()->forget('cart');
        //return view('completed-order',['order'=>$order['id'],'cart'=>$orders]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $cart = $request->session()->get('cart');
       // var_dump($cart);
        $request->session()->forget('cart');
        foreach ($cart as $cartitem) {
            foreach ($cartitem as $key=>$item) {
                //echo "<script>console.log($item)</script>";
                if ($item==$request['id']){


                }else{
                    $request->session()->push('cart',[$key=>$item]);
                }
            }

        }

//redirect()->back()
        //$request->session()->pull('cart',$request['delid']);
     //   $request->session()->flash('cart');
      return redirect('/cart');
    }
}
