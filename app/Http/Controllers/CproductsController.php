<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

class CproductsController extends Controller
{
    public function __construct()
    {
      $this->middleware('admin');
    }


    public function getProducts()
    {
      $products = Product::all();
      return view('adminp.products', compact('products'));
    }

    public function getProduct(Product $product)
    {
      return view('adminp.product', compact('product'));
    }

    public function getDelete(Product $product)
    {
      $product->delete();
      return redirect('/cpanel/products');
    }

    public function getApprove(Product $product)
    {
      $product->live = 1;
      $product->update();
      return redirect()->back();

    }

    public function getEdit(Product $product)
    {
      return view('adminp.product-edit', compact('product'));
    }

    public function getHide(Product $product)
    {
      $product->live = 0;
      $product->update();
      return redirect()->back();
    }
}
