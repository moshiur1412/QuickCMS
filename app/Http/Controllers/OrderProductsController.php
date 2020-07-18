<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Redirect;
use App\Http\Requests\StoreOrderproductsRequest;


class OrderProductsController extends Controller
{
 
  public function store(StoreOrderproductsRequest $req)
  {
    $order = new Order();
    $order->product_id = $req->product_id;
    $order->quantity = $req->quantity;
    $order->customer_name = $req->customer_name;
    $order->phone_number = $req->phone_number;
    $order->address = $req->address;
    $order->status = 'pending';
    $order->save();

    return redirect('/')->with('status', 'After you place your order, we will call within 24 hours alogn with an SMS confirm.');
}
}
