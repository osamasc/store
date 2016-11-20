@extends('layouts.admin.master')
@section('title') {{ $product->name}} | store.com @stop

@section('content')

  <div class="single-product">
      <div class="product col-md-6">
        <h3> {{ $product->name }}</h3>

        <img  height='200px;'" src="{{ URL::to('/') .'/'. $product->image}}" alt="" />
        <hr>
        <h4>User Info</h4>
        <strong> <i class="fa fa-user"></i> Product User:</strong>
        <span> <a href="{{ URL::to('/') .'/user/' . $product->user->id}}">{{ $product->user->fullname}}</a></span>
        <br>
        <strong><i class="fa fa-phone-square"></i> User Phone:</strong>
        <span>
        @foreach( $product->user->addresses  as $address)
        {{ $address->phone . ' -'}}
        @endforeach
        </span>
        <hr>


        <h4>Product info</h4>
        <strong><i class="fa fa-calendar-check-o"></i> Created At:</strong>
        <span >{{ $product->created_at }}</span>
        <br>
        <strong><i class="fa fa-object-group"></i> Catigory Name:</strong>
        <span>{{ $product->catigory->catigory_name}}</span>
        <br>
        <strong><i class="fa fa-money"></i> Price:</strong>
        <span>{{  number_format($product->price, 2, '.', '') }} $</span>
        <br>
        <strong><i class="fa fa-flickr"></i> Brand:</strong>
        <span>{{ $product->brand->brand_name}}</span>
        <br>
        <strong><i class="fa fa-sort-numeric-asc"></i> Amount:</strong>
        <span>{{ $product->limited}}</span>
        <br>
        <strong><i class="fa fa-location-arrow"></i> location:</strong>
        <span>{{ $product->location->name}}</span>
        <br>
        <strong>status:</strong>
        <span>{{ $product->status}}</span>
      </div>
      <div class="col-md-6 controller">
        <strong>Short Description:</strong>
        <br>
        <span>{{ $product->short_desc}}</span>
        <hr>
        <strong>Long Description:</strong>
        <br>
        <span>{{ $product->long_desc}}</span>
        <hr>

        @if ($product->live == 1)
          <a href="{{ URL::to('/') . '/cpanel/products/' . $product->id . '/hide'}}" class="link confirm">Hide</a>
        @endif
        @if ($product->live == 0)
        <a href="{{ URL::to('/') . '/cpanel/products/' . $product->id . '/approve'}}" class="link confirm">Aprove</a>
        @endif
        <a href="{{ URL::to('/') . '/cpanel/products/' . $product->id . '/edit'}}" class="link confirm">Edit</a>
        <a href="{{ URL::to('/') . '/cpanel/products/' . $product->id . '/delete'}}" class="link confirm">Delete</a>
        <a href="#"></a>
      </div>
  </div>
@stop

$pro = \DB::table('products')
                            ->where('month','>=',$from_month)
                            ->where('month','<=',$to_month)
                            ->where('year','>=',$from_year)
                            ->where('year','<=',$to_year)
                            ->get();

$(document).ready(function() {
    console.log("ready!");
});
