@extends('layouts.master')

@section('title')
Edit address
@stop

    @section('content')
    <div class="section">
      <div class="col-md-8 addresses">
        <h3><i class="fa fa-map-marker"></i> Update Current Address</h3><hr>
        <div class="col-md-6">
            <form action="{{ URL::to('/').'/checkout/address/'. $address->id . '/update' }}" method="post">
              <input type="hidden" name="id" value="{{ $address->id }}">
          {{ csrf_field()}}
          <div class="form-group">
              <input type="text" name="firstname" value="{{ $address->firstname }}"  class="form-control"  placeholder="First Name">
          </div>
          <div class="form-group">
              <input type="text" name="lastname"  class="form-control"  value="{{ $address->lastname }}" placeholder="Last Name">
          </div>
          <div class="form-group">
              <input type="text" name="phone"  class="form-control" value="{{ $address->phone }}" placeholder="Phone">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <input type="text" name="country"  class="form-control" value="{{ $address->country }}" placeholder="Country">
          </div>
          <div class="form-group">
              <input type="text" name="city"  class="form-control" value="{{ $address->city }}" placeholder="City">
          </div>
          <div class="form-group">
              <input type="text" name="street"  class="form-control" value="{{ $address->street}}" placeholder="Street Name/No.">
          </div>
        </div>

              <input type="submit" value="Update" class="btn btn-info">
        </form>
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
    </div>
@stop
