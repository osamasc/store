<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Order;

class OrdersController extends Controller
{
    
    public function __construct()
    {
      $this->middleware('admin');
    }


    public function getOrders()
    {
      $pendOrders = Order::where('status', 0)->get();
      $allOrders  = Order::all();
      $proOrders  = Order::where('status', 1)->get();
      $shippedOrders = Order::where('status', 2)->get();
      return view('adminp.orders', compact('pendOrders', 'allOrders', 'proOrders', 'shippedOrders'));
    }
    public function getEditOrder($id)
    {
      $order = Order::where('id', $id)->first();

      if ($order->first()){
        return view('adminp.order', compact('order'));
      }
    }

    public function postStatus(Order $order, $status) 
    { 
      $order->status = $status;
      $order->save();

          notify()->flash('Status Updated Successfully ', 'success', [
              'timer' => 2000
            ]);

      return redirect()->back();

    }
}
