@extends('layouts.admin.master')
@section('title') Users @stop

@section('content')

  <div class="col-md-12 catigories">
    <label for=""> <i class="fa fa-users"></i> Registerd Users</label>
    <table class="table">
        <tr>
          <th><i class="fa fa-list"></i></th>
          <th><i class="fa fa-stop"></i> Full Name</th>
          <th><i class="fa fa-envelope-o"></i> Email</th>
          <th><i class="fa fa-calendar-minus-o"></i> Created At</th>
          <th><i class="fa fa-globe"></i> Anonymous</th>
          <th><i class="fa fa-cog"></i> Admin</th>
          <th><i class="fa fa-gamepad"></i> Controller</th>

        </tr>

        @foreach ($users as $user)

        <tr>
          <td>{{ $user->id}}         </td>
          <td>{{ $user->fullname }}  </td>
          <td>{{ $user->email}}      </td>
          <td>{{ $user->created_at}}</td>
          <td>
            <i class="fa fa-check-circle"></i>
          </td>
          <td>
            <i class="fa fa-remove align-center"></i>
          </td>
          <td>
            <a href="{{ URL::to('/').'/cpanel/users/'. $user->id .'/delete' }}" id="confirm"><i class="fa fa-ban"></i></a>

          </td>
        </tr>
        @endforeach
      </table>
  </div>

@stop
