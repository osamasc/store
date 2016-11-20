@extends('layouts.admin.master')

@section('title') Admin Panel @stop

@section('content')

<div class="row">
	<div class="col-md-6">
	<h2>Statistics</h2>
		<table class="table">
			<tr>
				<td>Website Visitors Today</td>
				<td>20</td>
			</tr>
			<tr>
				<td>Website Visitors All The Time</td>
				<td>20</td>
			</tr>
			<tr>
				<td>Website Visitors All The Time</td>
				<td>20</td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<h2>Reports</h2>
		<table class="table">
			<tr>
				<td>Sold Products Today</td>
				<td>20</td>
			</tr>
		</table>
	</div>
</div>

@stop