@extends('layouts.master')

@section('title')
  My Orders
@stop

@section('content')

@include('includes/sidebar')

  <div class="col-md-7 list">
    <div class="list-heading">
      <span>Wishing list <i class="fa fa-angle-double-down"></i></span>

    </div>
        @foreach ($user->wishlists as $list)
          <div class="list-item">
            <div class="image">
              <img src="{{ URL::to('/').'/'.$list->product->image}}" alt="" />
            </div>
              <a href="{{ URL::to('/'). '/view/'. $list->product->id}}">{{$list->product->name}}</a>
              <h4>{{ number_format($list->product->price, 2, '.', '') }} EGP</h4><hr>
              <a class="btn btn-info" href="{{ URL::to('/').'/addProduct/'.$list->product_id}}">Add To Cart <i class="fa fa-shopping-cart"></i></a>
              <a class="button confirm" href="{{URL::to('/').'/list-remove/'. $list->id}}">remove</a>
          </div>
        @endforeach
  </div>
    @stop
