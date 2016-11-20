@extends('layouts.admin.master')
@section('title') Pending Products @stop

@section('content')

<div class="admin-products">
    <div class="catigories">
      <label for=""> <i class="fa fa-users"></i> Pending Products</label>
      <table class="table">
          <tr>
            <th><i class="fa fa-list"></i></th>
            <th>Product Name</th>
            <th>Created At</th>
          </tr>
          @foreach($products as $product)

          <tr>
            <td>{{$product->id}}</td>
            <td><a href="{{ URL::to('/') . '/cpanel/products/'. $product->id }}">{{ substr($product->name, 0, 100) }}</a></td>
            <td>{{$product->created_at}}</td>
          </tr>

          @endforeach

      </table>

    </div>
</div>

@stop
