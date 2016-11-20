<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\View;

use App\Product;

use App\Catigory;

use App\Cartitem;

use App\Cart;

use App\Wishlist;

class HomeController extends Controller
{

    public function __construct()
    {
      if (Auth::check()){

          $cart = Cart::where('user_id',Auth::user()->id)->first();

          if(!$cart)
          {
              $cart =  new Cart();
              $cart->user_id = Auth::user()->id;
              $cart->save();
          }

          $cartCount = CartItem::where('cart_id', Auth::User()->cart->id)->count();
          View::share('cartCount', $cartCount);
      }

    }

    public function getHome()
    {
        $products = Product::where('live', '1')->get();
        return view('home', compact('products'));
    }

    public function getItem(Product $product)
    {
        return view('item', compact('product'));
    }

    public function getCatigory($name)
    {
      $catigory = Catigory::where('catigory_name', $name)->first();
      return view('category', compact('catigory'));
    }

    public function postList($wishlist)
    {
      if(Product::find($wishlist)->first()){

        $user = Auth::user()->id;
        $list = new Wishlist();
        $list->user_id = $user;
        $list->product_id = $wishlist;
        $list->save();

        return redirect()->back();

      }
    }
}
