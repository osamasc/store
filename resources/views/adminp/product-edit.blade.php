@extends('layouts.admin.master')
@section('title') Edit Product @stop

@section('content')
<div class="single-product">
    <div class="col-md-6">
      <h3>Edit Product</h3>

      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" value="{{ $product->name }}">
      </div>

      <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" class="form-control" name="price" value="{{ $product->price }}">
      </div>

      <div class="form-group">
        <label for="status">Status:</label>
        <input type="text" class="form-control" name="status" value="">
      </div>

      <div class="form-group">
        <label for="short_desc"> Short Description</label>
        <input type="text" class="form-control" name="short_desc" value="">
      </div>

      <div class="form-group">
        <label for="long_desc">Long Descriptiom</label>
        <input type="text" class="form-control" name="long_desc" value="">
      </div>

      <div class="form-group">
        <label for="limited">Amount</label>
        <input type="text" class="form-control" name="limited" value="">
      </div>
    </div>

    <div class="col-md-6">

    </div>
</div>

@stop
