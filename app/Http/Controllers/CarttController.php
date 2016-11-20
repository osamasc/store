<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

use Session;

use App\Cart;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getAddToCart(Request $request, Product $product)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getDeleteFromCart(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        if ($oldCart != null){

            $cart = new Cart($oldCart);

            $cart->delete($id);

            if ($cart->items = null)
            {
              session()->forget('cart');
            } else {
              session()->put('cart', $cart);
            }

            return redirect()->back();

        }
    }

    public function getCart()
    {

      $oldCart = Session::get('cart');

      if (!Session::has('cart')){
          return view('shop-cart', ['products' => 'null']);
      }

      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      return view('shop-cart', ['products' => $cart->items , 'totalPrice' => $cart->totalPrice]);

    }

    public function getCheckout()
    {
      if (!Session::has('cart')){
          return view('shop-cart');
      }

      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $total = $cart->totalPrice;
      return view('checkout', compact('total'));

    }
}
