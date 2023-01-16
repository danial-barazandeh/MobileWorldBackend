<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class OrderController extends Controller
{
    public function getOrders(){
        $user = Auth::user();
        // $user = User::find(1);
        $orders = Order::where('user_id',$user->id)->with('product')->with('user')->with('vendor')->get();
        if ($orders) {
            return response()
                ->json(['success' => '1',
                    'orders' => $orders]);
        } else {
            return response()
            ->json(['success' => '0']);
        }
    }

    public function addOrder(Request $request){
        $user = Auth::user();
        // $user = User::find(1);
        $product = Product::find($request['product_id']);
        $order = new Order;
        $order->user_id = $user->id;
        $order->product_id = $product->id;
        $order->status = 'waiting';
        $order->sale_price_at_time = $product->sale_price;
        $order->price_at_time = $product->price;
        $order->vendor_id= $product->vendor_id;
        $order->save();
        $temp = Order::find($order->id)->with('product')->with('user')->with('vendor');

        if ($order) {
            return response()
                ->json(['success' => '1',
                    'order' => $temp]);
        } else {
            return response()
            ->json(['success' => '0']);
        }

    }
}
