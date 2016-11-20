@extends('layouts.master')

@section('title')
Products 
@stop

@section('content')
<div class="products">
  <div class="col-md-10 track">
    <h5>Track Your Products</h5>

    @foreach ($products as $product)
      <div class="one">
        <div class="title">
          <img src="{{URL::to('/').'/'.$product->image}}" alt="" />
        </div>

        <table class="table">
          <tr>
            <th><i class="fa fa-angle-double-down"></i> Product Name</th>
            <th><i class="fa fa-angle-double-down" aria-hidden="true"></i> Amount</th>
            <th><i class="fa fa-angle-double-down"></i> Created At</th>
            <th><i class="fa fa-tasks"></i> Category</th>
          </tr>
          <tr>
            <td><a href="{{ URL::to('/').'/view/'.$product->id}}">{{ substr($product->name, 0, 60) }}</a></td>
            <td>{{ $product->limited}}</td>
            <td>{{ $product->created_at}}</td>
            <td>{{ $product->catigory->catigory_name}}</td>
          </tr>
        </table>
      </div>
    @endforeach
  </div>
  <div class="col-md-6 add">
    <h5><strong>Add A New product</strong></h5>
    @include('includes/formp')
  </div>
  @if (count($errors) > 0)
    <div class=" alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

</div>

@stop
