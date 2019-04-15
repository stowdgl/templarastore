<?php

namespace App\Http\Controllers;
use App\Prices;
use App\Products;
use App\Categories;
use App\Orders;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {

        if (auth()->check())
        {
            if ((auth()->user()->user_type)=='admin'){

                $products= Products::with('categories','prices')->orderBy('created_at')->paginate(50);
                $categories = Categories::with('products')->orderBy('title')->get();
		        $orders = Orders::with('products')->orderBy('created_at','desc')->get();
		        $prices = [];
                foreach ($orders as $order) {
                    foreach ($order->products as $item) {
                        $prices[] = Prices::with('products')->where('product_id',$item->id)->get();
                    }
		        }

                return view('admin.dashboard',['categories'=>$categories,'products'=>$products,'orders'=>$orders,'prices'=>$prices]);
            }else{
                abort(404);

            }
        }else{
            abort(404);

        }

    }
    public function storeProd(Request $request){
        if (auth()->check())
        {
            if ((auth()->user()->user_type)=='admin'){
                $product = new Products;
                $product->title = $request['title'];
                $product->code = $request['code'];
                $product->specifications = $request['specifications'];
                $product->manufacturer = $request['manufacturer'];
                $product->manufacturer_img = '/img/'.$request['manufacturerimg'];
                $product->product_img = '/img/'.$request['productimg'];
                $product->items_available = $request['itemsavailable'];

                $product->save();
                $product->categories()->attach($request['categories'],['products_id'=>$product->id]);
                $price = new Prices;
                $price->price =  $request['price'];
                $price->product_id = $product->id;
                $price->save();
                $price->products()->attach($price->id,['products_id'=>$product->id]);

                return redirect('/dashboard');
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }
    public function storeCat(Request $request){
        if (auth()->check())
        {
            if ((auth()->user()->user_type)=='admin'){
                $category = new Categories;
                $category->title = $request['title'];
                $category->parent_id = $request['parent_id'];
                $category->products()->attach($request['categories'],['products_id'=>$category->id]);
                $category->save();
                return redirect('/dashboard');
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }
    public function modifyProd(Request $request){
        $product = Products::find($request['id']);
        $categories = Categories::with('products')->orderBy('title')->get();
        return view('admin.modify',['req'=>$request,'categories'=>$categories,'product'=>$product]);
    }
    public function modifyProdProc(Request $request){
        if (auth()->check())
        {
            if ((auth()->user()->user_type)=='admin'){
                $product = Products::find($request['prodid']);
                $product->categories()->detach();
                $product->prices()->detach();
                $product->title = $request['title'];
                $product->code = $request['code'];
                $product->specifications = $request['specifications'];
                $product->manufacturer = $request['manufacturer'];
                $product->manufacturer_img = '/img/'.$request['manufacturerimg'];
                $product->product_img = '/img/'.$request['productimg'];
                $product->items_available = $request['itemsavailable'];

                $product->save();
                $product->categories()->attach($request['categories'],['products_id'=>$product->id]);
                $price = new Prices;
                $price->price =  $request['price'];
                $price->product_id = $product->id;
                $price->save();
                $price->products()->attach($price->id,['products_id'=>$product->id]);

                return redirect('/dashboard');
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }

    }
    public function orderproc(Request $request){

        switch ($request['proc']){
            case 1:
                $ordproducts = Orders::with('products')->where('id',$request['id'])->get();
                $order_products = [];
                foreach ($ordproducts as $ordproduct) {
                    foreach ($ordproduct->products as $product) {
                        $order_products[] = $product->id;
                    }
                }
                $order_products = array_count_values($order_products);
                foreach ($order_products as $key=>$order_product) {
                    $prd = Products::find($key);
                    $prd->items_available = (intval($prd->items_available)-intval($order_product));
                    $prd->save();
                }

                $orders = Orders::find($request['id']);
                $orders->order_status = 'Обработан';
                $orders->save();
                break;
            case 2:
                $orders = Orders::find($request['id']);
                $orders->products()->detach();
                $orders->order_status ='Отменён';
                $orders->save();
                break;
            default:
                break;
        }
        return redirect('/dashboard');
    }
    public function deleteProd(Request $request){
        $id = $request['id'];
        $product = Products::find($id);
        Products::destroy($id);
        $price = Prices::where('product_id','=',$id)->take(1);
        $price->delete();
        $product->categories()->detach();
        $product->prices()->detach();
        return redirect('/dashboard');
        //return view('test',['id'=>$product]);
    }
}
