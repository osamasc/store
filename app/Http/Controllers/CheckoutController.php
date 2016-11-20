<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cart;

use App\Address;

use App\Order;

use App\OrderItem;

use App\User;


class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function getCheckout()
    {
        $user = Auth::user();
        $id = $user->id;
        $cart = Cart::where('user_id', $id)->first();

        $test = $user->address_id;

        $address = Address::where('id', $user->address_id)->first();
        if ($address == null){
          return redirect('/checkout/address/add');
        }
        if ($cart->first())
        {
            $items = $cart->cartItems;

            if ($items->first())
            {
              $cart = Cart::where('user_id', Auth::user()->id)->first();
              $items = $cart->cartItems;

              $items = $cart->cartItems;
              $total=0;
              foreach($items as $item){
                  $total+=$item->product->price * $item->qty;
              }


              return view('checkout', compact('address', 'items', 'total'));
            } else {
              return view('errors.503');
            }
        }
    }

    public function getEditAdd()
    {

      $user = Auth::user();
      $address = Address::where('id', $user->address_id)->first();

      if(Auth::user()->id != $address->user_id)
      {
        redirect()->back();
      }

      return view('checkout-address', compact('address'));


    }

    public function postEditedAdd(Request $request,  $id)
    {
      $address = Address::find($id);
      $address->firstname = $request['firstname'];
      $address->lastname  = $request['lastname'];
      $address->phone     = $request['phone'];
      $address->country   = $request['country'];
      $address->city      = $request['city'];
      $address->street    = $request['street'];

      if(Auth::user()->id != $address->user_id)
      {
        redirect()->back();
      }

      $address->update();
      return redirect('/checkout');

    }

    public function postCheckout()
    {
      $user = Auth::user();
      $cart = Cart::where('user_id', Auth::user()->id)->first();

      if ($cart !== null) {

        if ($cart->cartItems->count() > 0){

          $items = $cart->cartItems;
          $address = Address::where('id', $user->address_id)->first();

          if ($address !== null){

              $total = 0;

              foreach ($items as $item ) {
                $total+=$item->product->price * $item->qty;
              }

              $order = new Order();
              $order->user_id = $user->id;
              $order->total = $total;
              $order->address_id = $user->address_id;
              $order->save();

              foreach ($items as $item ) {

                $newitem = new OrderItem();
                $newitem->product_id =  $item->product->id;
                $newitem->amount = $item->qty;
                $newitem->price  = $item->product->price;
                $newitem->total  = $item->product->price * $item->qty;
                $order->orderdetails()->save($newitem);
              }

              $cart->cartItems()->delete();

              notify()->flash('Excellent, Your Order Has Been Submitted', 'success', [
                  'timer' => 2000
              ]);


              return redirect()->route('orders');



          }else {
            echo 'Address Is Not Exist';
          }

        } else {
          echo 'not Items';
        }

      } else {
        echo 'no Cart';
      }
    }

    public function getNewAddress()
    {
      return view('checkout-add-address');
    }

    public function postNewAddress(Request $request)
    {
      $address = new Address();
      $address->user_id   = Auth::user()->id;
      $address->firstname = $request['firstname'];
      $address->lastname  = $request['lastname'];
      $address->phone     = $request['phone'];
      $address->country   = $request['country'];
      $address->city      = $request['city'];
      $address->street    = $request['street'];

      $address->save();



    if($address->id){

      $user = User::find(Auth::user()->id);
      $user->address_id = $address->id;
      $user->save();
      return redirect('/checkout');

    }
    }
}
