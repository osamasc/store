<?php 

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Cart;

use App\CartItem;


class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addItem ($productId){

        $cart = Cart::where('user_id', Auth::user()->id)->first();

        if(!$cart){
            $cart =  new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

        $cartItem  = new CartItem();
        $cartItem->product_id=$productId;
        $cartItem->cart_id= $cart->id;
        $cartItem->qty = 1;
        $cartItem->save();

        return redirect('/cart');

    }

    public function showCart(){

        $cart = Cart::where('user_id', Auth::user()->id)->first();

        $cartCount = CartItem::where('cart_id', Auth::user()->cart->id)->count();

        if(!$cart){
            $cart =  new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

        if ($cart->cartItems->count() > 0)
        {
          $items = $cart->cartItems;
          $total=0;
          foreach($items as $item){
              $total+=$item->product->price * $item->qty;
          }

          return view('cart',['items'=>$items,'total'=>$total, 'cartCount' => $cartCount]);

        } else {
          notify()->flash('Shopping Cart Is Empty', 'error', [
              'timer' => 2000
          ]);
          return redirect('/');

        }

    }

    public function removeItem($id){

        CartItem::destroy($id);
        return redirect('/cart');
    }
}
