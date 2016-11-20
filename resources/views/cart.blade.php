@extends('layouts.master')

@section('title')
Shop Cart
@stop

    @section('content')
    <div class="products">
        <div class="col-md-10 track">
            <h5>Shoping Cart</h5>
                @foreach ($items as $item)
                    <div class="one">
                        <div class="title">
                            <img src="{{URL::to('/').'/'.$item->product->image}}" alt="" />
                        </div>
                        <table class="table">
                            <tr>
                              <th><i class="fa fa-angle-double-down"></i> Product Name</th>
                              <th><i class="fa fa-angle-double-down" aria-hidden="true"></i> Amount</th>
                              <th><i class="fa fa-angle-double-down"></i> Total</th>
                              <th><i class="fa fa-tasks"></i> Controller</th>
                            </tr>
                            <tr>
                              <td><a href="{{ URL::to('/').'/view/'.$item->product->id}}"> {{ substr($item->product->name, 0, 60) }}</a></td>
                              <td>{{ $item->qty }}</td>
                              <td>{{$item->product->price * $item->qty}}</td>
                              <td><a  class="btn"href="{{ URL::to('/').'/removeItem/'.$item->id}}" id="confirm">Remove</a></td>
                            </tr>
                        </table>
                    </div>
                @endforeach
      </div>
    </div>
    <div class="total">
      <h3>Total</h3>
      <h3><strong>{{$total}} EGP</strong></h3>
      <a class="new" href="{{ asset('/checkout')}}">Checkout <i class="fa fa-play"></i></a>
      <a class="new" href="{{ asset('/')}}">Continue Shoping <i class="fa fa-shopping-cart"></i></a>
    </div>
@stop
