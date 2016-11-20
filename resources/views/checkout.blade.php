@extends('layouts.master')

@section('title')
Checkout
@stop

@section('content')

  <div class="addresses-heading col-md-7">
    <div class="top">
      <span>Shipping Address <i class="fa fa-angle-double-down"></i></span>
    </div>
  </div>

  <div class="section col-md-7">

      <div class="address">

          <span><i class="fa fa-user"></i> {{ $address['firstname'] }} {{ $address['lastname'] }}</span>

          <span><i class="fa fa-map-marker"></i> {{ $address['country'] . ', ' . $address['city'] }}</span>
          <span><i class="fa fa-phone"></i> +20 {{ $address['phone'] }}</span>
          <span><i class="fa fa-map"></i> {{ $address['street'] }}</span>
          <div class="address-controller">
            <a class="button btn-xs" href="{{ asset('/checkout/address/edit') }}">Edit</a>
          </div>

      </div>
    </div>



    <div class="col-md-7 account-orders">
      <div class="top">
        <span> Your Order <i class="fa fa-angle-double-down"></i></span>
      </div>
        <div class="orders">
            <div class="unit">
              <i class="fa fa-cc-visa"></i>
              <strong>Total Price:</strong> <span>{{$total}} EGP</span>
            </div>
            @foreach($items as $item)
              <div class="order-item">
                <div class="image" style="max-height=80px">
                  <img src="{{ URL::to('/').'/'.$item->product->image}}" alt="" />
                </div>
                <a href="{{URL::to('/') . '/'.'view/'. $item->product->id}}">{{$item->product->name}}</a>
                <span>{{$item->product->price}} EGP</span>
                <hr>
                <strong>{{ $item->qty}} pieces</strong>
              </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-7">
        <a class="btn btn-info" href="{{URL::to('/').'/done'}}">Continue</a>
    </div>
@stop
