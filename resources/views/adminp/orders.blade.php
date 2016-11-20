@extends('layouts.admin.master');

@section('title')
Orders
@stop

@section('content')
<button class="btn btn-info" id="pending-button">Pending</button>
<button class="btn btn-info" id="inpro-button">In Progress</button>
<button class="btn btn-info" id="del-button">Shipped</button>
<button class="btn btn-info" id="all-button">All</button>
<hr>

<div class="orders-block" id="pending">
  <div class="row">
    <a href="#" class="button"><strong>Pending Orders</strong></a>
      <table class="table tbl">
        <tr>
          <th>Order #ID</th>
          <th>User</th>
          <th>Total Price</th>
          <th>Created At</th>
          <th>Control</th>
        </tr>
        @foreach($pendOrders as $order)
        <tr>
          <td>{{ $order->id }}</td>
          <td>{{ $order->user->fullname}}</td>
          <td>{{ $order->total}} EGP</td>
          <td>{{ $order->created_at }}</td>
          <td>
            <a href="{{URL::to('/') .'/cpanel/order/' . $order->id . '/edit'}}"> Show</a>
          </td>
        </tr>
        @endforeach
      </table>
  </div>

</div>
  


    <div class="row orders-block" style="display:none !important" id="inpro">
      <a href="#" class="button"><strong>In progress</strong></a>
        <table class="table tbl">
          <tr>
            <th>Order #ID</th>
            <th>User</th>
            <th>Total Price</th>
            <th>Control</th>
          </tr>
          @foreach($proOrders as $order)
          <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->fullname}}</td>
            <td>{{ $order->total}} EGP</td>
            <td>
            <a href="{{URL::to('/') .'/cpanel/order/' . $order->id . '/edit'}}"> Show</a>
            </td>
          </tr>
          @endforeach
        </table>
    </div>

        <div class="row orders-block" style="display:none !important" id="shipped">
          <a href="#" class="button"><strong>shipped Orders</strong></a>
            <table class="table tbl">
              <tr>
                <th>Order #ID</th>
                <th>User</th>
                <th>Total Price</th>
                <th>Control</th>
              </tr>
              @foreach($shippedOrders as $order)
              <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->fullname}}</td>
                <td>{{ $order->total}} EGP</td>
                <td>
            <a href="{{URL::to('/') .'/cpanel/order/' . $order->id . '/edit'}}"> Show</a>
                </td>
              </tr>
              @endforeach
            </table>
        </div> 

            <div class="row orders-block" style="display:none !important" id="all">
              <a href="#" class="button"><strong>All Orders</strong></a>

                <table class="table tbl">
                  <tr>
                    <th>Order #ID</th>
                    <th>User</th>
                    <th>Total Price</th>
                    <th>Control</th>
                  </tr>
                  @foreach($allOrders as $order)
                  <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->fullname}}</td>
                    <td>{{ $order->total}} EGP</td>
                    <td>
            <a href="{{URL::to('/') .'/cpanel/order/' . $order->id . '/edit'}}"> Show</a>
                    </td>
                  </tr>
                  @endforeach
                </table>
            </div>



@stop
