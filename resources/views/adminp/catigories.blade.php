@extends('layouts.admin.master')

@section('title') Catigories @stop

@section('content')

<div class="new-cat col-md-4 ">
        <form class="form" action="{{ URL::to('/') . '/cpanel/catigory/add'}}" method="post">
        <div class="form-group">
          <label for="catigory"> <i class="fa fa-wrench"></i> Add a new catigory</label>
          <input type="text" class="form-control con" name="catigory_name"  autocomplete="off">
        </div>
        <input  type="submit" class="btn btn-info submit"value="Add">
        {{csrf_field()}}

    </form>
</div>

<div class="col-md-6 catigories">
  <label for="">Catigories</label>
  <table class="table table-hover">
    <tr>
      <th><i class="fa fa-list"></i> ID</th>
      <th><i class="fa fa-stop"></i> Name</th>
      <th><i class="fa fa-gamepad"></i> Controller</th>
    </tr>
    @foreach ($catigories as $catigory)
    <tr>
      <td>{{ $catigory['id']}}</td>
      <td>{{ $catigory['catigory_name']}}</td>
      <td>
        <i class="fa fa-wrench"></i>
        <a class="confirm" href="{{ URL::to('/') . '/cpanel/catigory/'. $catigory['id'] .'/delete'}}"><i class="fa fa-close"></i></a>
      </td>
    </tr>

    @endforeach
      </table>
</div>
@stop
