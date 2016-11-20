@extends('layouts.master')

@section('title')
  Online Shopping
@stop

@section('content')
    <div class="home">
        @foreach ($products as $product)
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail item-box">
                    <span class="price-tag">{{$product->price}} EGP</span>
                    <img class="img-responsive" style="max-height:150px" src="{{$product->image}}" alt="" />
                    <div class="caption">
                        <h5><a href="{{ URL::to('/') . '/view/' . $product->id}}">{{ substr($product->name, 0, 60) }} </a></h5>
                        <strong><a href="{{ URL::to('/') . '/category/' . $product->catigory->catigory_name}}">{{ $product->catigory->catigory_name}}</a></strong>
                    <div class="date"></div>
                    </div>
                </div>
            </div>
          @endforeach
    </div>
@stop
