@extends('layouts.master')

@section('title')
  My Orders
@stop

@section('content')
@include('includes/sidebar')

  <div class="col-md-7 account-orders">
    <div class="top">
      <span>Track Your Orders <i class="fa fa-angle-double-down"></i></span>
    </div>
      @foreach($orders as $order)
      <div class="orders">
          <div class="unit">
            <i class="fa fa-sort"></i>
            <strong>Order ID:</strong> <span>{{$order->id}}</span>
          </div>
          <div class="unit">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <strong>Created at:</strong> <span>{{$order->created_at}}</span>
          </div>
          <div class="unit">
            <i class="fa fa-cc-visa"></i>
            <strong>Total Price:</strong> <span>{{$order->total}} EGP</span>
          </div>
          <div class="unit">
            <i class="fa fa-check"></i>
            <strong>Status:</strong> <span>
              @if($order->status == 0 )
              Pending
              @elseif($order->status == 1)
              In Progress
              @elseif($order->status == 2)
              Shipped
              @elseif($order->status == 3)
              Deliverd
              @endif

            </span>
          </div>

          @foreach($order->orderdetails as $item)
            <div class="order-item">
              <div class="image" style="max-height=80px">
                <img src="{{ URL::to('/').'/'.$item->product->image}}" alt="" />
              </div>
              <a href="{{URL::to('/') . '/'.'view/'. $item->product->id}}">{{$item->product->name}}</a>
              <span>{{$item->price}} EGP</span>
            </div>
          @endforeach
      </div>

      @endforeach

  </div>
    @stop
