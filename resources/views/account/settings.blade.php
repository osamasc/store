@extends('layouts.master')

@section('title')
  Settings
@stop

@section('content')
@include('includes/sidebar')

<div class="col-md-7 settings">
    <h3><i class="fa fa-angle-double-down"></i> Account Information</h3>      
    <div id="table" class="settings-table" id="pending">
        <table   class="table">
              <tr>
                <td><i class="fa fa-angle-right"></i> Email </td>
                <td>{{ $user->email}}</td>
              </tr>
              <tr>
                <td><i class="fa fa-angle-right"></i> User Name </td>
                <td>{{ $user->username}}</td>
              </tr>
              <tr>
                <td><i class="fa fa-angle-right"></i> Gender </td>
                <td>{{ ($user->gender == 1 ) ? 'mail' : 'famale' }}</td>
              </tr>
              <tr>
                <td><i class="fa fa-angle-right"></i> Password </td>
                <td><a id="password-edit" href="#">Edit</a></td>
              </tr>
        </table>
        <button id="edit" class="btn btn-info" href"">Edit</button>
    </div>
      
    <div id="edit-page" style="display:none !important">
          <form action=" {{asset('/account/update')}}" method="post">
            {{ CSRF_field() }}
              <div class="form-group">
                  <label for="fullname">Fullname</label>
                  <input type="text"  class="form-control" name="fullname" value="{{ $user->fullname }}">
              </div>
            
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email"  class="form-control" name="email" value="{{ $user->email }}"> 
              </div>
            
              <div class="form-group" >
                  <label for="gender" >Gender</label>
                  <select class="form-control" name="gender">
                      <option value="1" {{ ($user->gender == 1) ? 'selected' : '' }}  >Mail</option>
                      <option value="2" {{ ($user->gender == 2) ? 'selected' : '' }}>Femele</option>
                  </select>
              </div>  
              <input type="submit" value="Update" class="btn btn-info">
              <a href="#" id="edit-back-home" class="btn btn-primary">Back</a>

      </form>
       </div>
          <div id="password-page" style="display:none !important">
              <form action=" {{asset('/account/password/update')}}" method="post">
                {{ CSRF_field() }}
                  <div class="form-group">
                      <label for="old-password">Old Password</label>
                      <input type="password"  class="form-control" name="oldpassword" required>
                  </div>
                
                  <div class="form-group">
                      <label for="newpassword">New Password</label>
                      <input type="password"  class="form-control" name="newpassword" required> 
                  </div>

                  <div class="form-group">
                      <label for="password_confirmation">Password Confirmation</label>
                      <input type="password"  class="form-control" name="newpassword_confirmation" required> 
                  </div>

                  <input type="submit" value="Update" class="btn btn-info">
                  <a href="#" id="back-home" class="btn btn-primary">Back</a>
          </form>
        </div>

</div>
    @stop
