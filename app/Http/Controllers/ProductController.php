<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\View;

use App\Http\Requests;

use App\Product;

use App\Cities;

use App\Catigory;

use App\Brand;

use App\Cart;

use App\CartItem;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

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

    public function getHome() // home page
    {

      // Required for the form options
      $catigories = Catigory::all();
      $brands     = Brand::all();
      $cities     = Cities::all();

      // get user products
      $id         = Auth::user()->id;
      $products   = Product::where('user_id', $id)->get();

      // return the view of public/sell
      return view('account.products', compact('catigories', 'products', 'brands', 'cities'));
    }

    public function postNewProduct(Request $request)
    {
/*
      $this->validate($request, [
        'catigory_id' => 'required',
        'price'       => 'required|numeric',  // number
        'name'        => 'required',  //string
        'location'    => 'required', //string
        'short_desc'  => 'required', // string
        'long_desc'   => 'required', // string
        'status'      => 'required',  /// string
        'limited'     => 'required|numeric', // number
        'brand'       => 'required|numeric', // number
        'image'       => 'image|mimes:jpg,png'
      ]);
*/
      // Manage Required photo
      $photo      = $request->file('image');
      $photoName  = time() . $photo->getClientOriginalName();
      $path       ='uploads/images/products';
      $photo->move($path, $photoName);

      // make net product
      $product              = new Product();
      $product->user_id     = Auth::user()->id;
      $product->catigory_id = $request->catigory_id;
      $product->price       = $request->price;
      $product->name        = $request->name;
      $product->location_id = $request->location_id;
      $product->short_desc  = $request->short_desc;
      $product->long_desc   = $request->long_desc;
      $product->status      = $request->status;
      $product->limited     = $request->limited;
      $product->brand_id    = $request->brand_id;
      $product->image       = 'uploads/images/products/' .$photoName;
      $product->save();

      notify()->flash('Wow Your Product Is Submited', 'success', [
          'timer' => 2000
      ]);


      // redirct the user back
      return redirect()->back();
    }
}
