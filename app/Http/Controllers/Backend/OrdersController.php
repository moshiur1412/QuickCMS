<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;


class OrdersController extends Controller
{
	public function index(){

		$orders = Order::orderBy('created_at', 'desc')->paginate(10);

		return view('backend.orders.index', compact('orders'));
	}

	public function edit($id){

		$order = Order::findOrFail($id);

		return view('backend.orders.form',compact('order'));
	}

	public function update(Request $request, $id)
	{
		$order = Order::findOrFail($id);

		$order->status = $request->status;
		$order->save();
		return redirect(route('orders.index'));
	}


	public function confirm($id){

		$order = Order::findOrFail($id);


		return view('backend.orders.confirm', compact('order'));
	}

	public function destroy($id)
	{
		$order = Order::findOrFail($id);

		$order->delete();

		return redirect(route('orders.index'));
	}
}
