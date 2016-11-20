@extends('layouts.master')

@section('title')
  Shipping address
@stop

    @section('content')
    <div class="section">
      <div class="col-md-5 addresses">
        <h3>Create a new address</h3>
        <form action="{{ asset('/checkout/address/post') }}" method="post">
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
              <div class="form-group">
                  <input type="text" name="country"  class="form-control" value="" placeholder="Country">
              </div>
              <div class="form-group">
                  <input type="text" name="city"  class="form-control" value="" placeholder="City">
              </div>
              <div class="form-group">
                  <input type="text" name="street"  class="form-control" value="" placeholder="Street Name/No.">
              </div>
                  <input type="submit" value="Create" class="btn btn-info">
          </form>
      </div>
    </div>
@stop
