@extends('layouts.master')

@section('title')
  Shipping addresses
@stop

@section('content')

@include('includes/sidebar')

<div class="section">

  <div class="col-md-8 addresses">
    <h3><i class="fa fa-map-marker"></i> Create A New Address</h3><hr>
    <div class="col-md-6">
      <form action="{{ route('post.newadd')}}" method="post">

      {{ csrf_field()}}
      <div class="form-group">
          <input type="text" name="firstname"  class="form-control"  placeholder="First Name">
      </div>

      <div class="form-group">
          <input type="text" name="lastname"  class="form-control"  placeholder="Last Name">
      </div>

      <div class="form-group">
          <input type="text" name="phone"  class="form-control" value="" placeholder="Phone">
      </div>

    </div>
    <div class="col-md-6">
      <div class="form-group">
          <input type="text" name="country"  class="form-control" value="" placeholder="Country">
      </div>

      <div class="form-group">
          <input type="text" name="city"  class="form-control" value="" placeholder="City">
      </div>

      <div class="form-group">
          <input type="text" name="street"  class="form-control" value="" placeholder="Street Name/No.">
      </div>

    </div>

          <input type="submit" value="Create" class="btn btn-info">
      </form>

              @if (count($errors) > 0)
                <div class="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif

  </div>
</div>

@stop
