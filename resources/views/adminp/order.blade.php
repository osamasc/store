@extends('layouts.admin.master')
@section('title')
Order
@stop

@section('content')

<div class="cpanel-order">
	<div class="order-user-info col-md-4">
		<h3>User Details</h3>
		<table class="table">
			<tr>
				<td>OrderUser</td>
				<td>{{ $order->address->firstname . ' ' . $order->address->lastname }}</td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>{{ $order->address->phone }}</td>
			</tr>
			<tr>
				<td>Country</td>
				<td>{{ $order->address->country }}</td>
			</tr>
			<tr>
				<td>City</td>
				<td>{{ $order->address->city }}</td>
			</tr>
			<tr>
				<td>Street</td>
				<td>{{ $order->address->street }}</td>
			</tr>
		</table>
	</div>
	<div class="order-info col-md-6">
		<h3>Order Details</h3>
		<table class="table">
			<tr>
				<td>OrderID</td>
				<td>{{ $order->id}}</td>
			</tr>
			<tr>
				<td>OrderTotal</td>
				<td>{{ $order->total}} EGP</td>
			</tr>
			<tr>
				<td>OrderStatus</td>
				<td>
					@if($order->status == 0 )
					Pending
					@elseif($order->status == 1)
					In Progress
					@elseif($order->status == 2)
					Shipped
					@elseif($order->status == 3)
					Deliverd
					@endif

				</td>
			</tr>
			<tr>
				<td>Creating Time</td>
				<td>{{ $order->created_at }}</td>
			</tr>
			<tr>
				<td>Control</td>
				<td>
					@if($order->status == 0 ) 
					<a href="{{ URL::to('/').'/cpanel/order/' . $order->id . '/status/1' }}" class="btn btn-success">Approve</a>
					@elseif($order->status == 1)
					<a href="{{ URL::to('/').'/cpanel/order/' . $order->id . '/status/2' }}" class="btn btn-primary">Shipped</a>
					@elseif($order->status == 2)
					<a href="{{ URL::to('/').'/cpanel/order/' . $order->id . '/status/3' }}" class="btn btn-info">Deliverd</a>
					@endif
				</td>
			</tr>
		</table>

	</div>
	<div class="order-product-info col-md-7">
		<h3>Product Info</h3>
		 @foreach($order->orderdetails as $item)
		 <table class="table">
		 	<tr>
		 		<td>Product Name</td>
		 		<td><a href="{{ URL::to('/').'/view/'.$item->product->id}}"> {{ substr( $item->product->name, 0, 60 )}}</a></td>
		 	</tr>
		 	<tr>
		 		<td>Amount</td>
		 		<td>{{ $item->amount}} peace</td>
		 	</tr>
		 	<tr>
		 		<td>Price</td>
		 		<td>{{ $item->product->price}} EGP</td>
		 	</tr>
		 	<tr>
		 		<td>Total</td>
		 		<td>{{ $item->total}} EGP</td>
		 	</tr>
		 	<tr>
		 		<td>Location</td>
		 		<td>{{ $item->product->location->name}}</td>

		 	</tr>
		 </table>
		@endforeach
	</div>
</div>



@stop
