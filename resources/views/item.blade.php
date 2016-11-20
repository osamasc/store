@extends('layouts.master')

@section('title')

{{ $product->name }}

@stop



@section('content')
  <div class="item-b">
      <div class="col-md-8 item-bb">
          <h3>{{ $product->name}}</h3>
          <h5>By <a href="#">{{$product->user->fullname}}</a> <a href="#">, {{$product->catigory->catigory_name}}</a></h5>
          <img class="img-responsive" style="max-height=200px" src="{{ URL::to('/') . '/' .$product->image}}" alt="" />
          <h4>{{ number_format($product->price, 2, '.', '') }} EGP</h4>
          <span>Brand:</span> <a href="#">{{ $product->brand->brand_name }}</a>
          <br><span>Status:</span> {{ $product->status}}
          <h3>Description</h3>
          <p>{{ $product->short_desc}}</p><hr>
          <h3>More information</h3>
          <p>{{$product->long_desc}}</p>
      </div>
      <div class="col-md-3">
          <a href="{{ URL::to('/') . '/account/lists/add/' . $product->id}}" class="new">Add To Wish List</a>
          <a href="{{ URL::to('/') . '/addProduct/' . $product->id }}" class="new">Add To Cart</a>
      </div>
  </div>
@stop
