@extends('layouts.master')

@section('title')
  Shipping addresses
@stop

@section('content')

  @include('includes/sidebar')

<div class="addresses-heading col-md-7">
  <div class="top">
    <span>Shipping Addresses <i class="fa fa-angle-double-down"></i></span>
  </div>
  <div class="address-new">
    <a class="btn btn-info" href="{{route('address.create')}}">Create a new address</a>
  </div>
</div>

<div class="section col-md-7">

    @foreach ($user->addresses as $address)
    <div class="address">

        <span><i class="fa fa-user"></i> {{ $address['firstname'] }} {{ $address['lastname'] }} <small class="small">@if ($user->address_id == $address->id) {{'(Primary)'}} @endif</small></span>

        <span><i class="fa fa-map-marker"></i> {{ $address['country'] . ', ' . $address['city'] }}</span>
        <span><i class="fa fa-phone"></i> +20 {{ $address['phone'] }}</span>
        <span><i class="fa fa-map"></i> {{ $address['street'] }}</span>
        <div class="address-controller">
          <a class="button btn-xs" href="{{ URL::to('/').'/address/'. $address['id'].'/edit'}}">Edit</a>
          <a class="button btn-xs confirm"href="{{ URL::to('/').'/address/'. $address['id'].'/delete'}}">Remove</a>
          @if ($user->address_id !== $address->id)
          <a class="button btn-xs confirm"href="{{ URL::to('/') . '/addresses/primary/'. $address->id }}">Primary</a>
          @endif
        </div>

    </div>
    @endforeach


  </div>
</div>


  @stop
