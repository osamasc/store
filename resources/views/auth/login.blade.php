@extends('layouts.auth')

@section('title')
Login
@stop

@section('content')


<div class="text-center" style="padding:50px 0">

  <div class="logo">login</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="login-form" action="{{ route('post.log')}}" method="post" class="text-left">
      {{ csrf_field() }}
      <div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">

          <div class="form-group">
						<label for="username" class="sr-only"></label>
						<input type="text" class="form-control" id="username" name="username" placeholder="username" >
					</div>

          <div class="form-group">
						<label for="password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="password" >
					</div>

          <div class="form-group login-group-checkbox">
						<input type="checkbox" id="lg_remember" name="lg_remember">
						<label for="lg_remember">remember</label>
					</div>
				</div>
				<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
        @if (Session::has('message'))
        <p class="login-form-main-message"><strong>{{ session::get('message')}}</strong></p>

        @endif
        @if (count($errors) > 0)
          <div class=" alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

      	<p>forgot your password? <a href="{{ route('forget') }}">click here</a></p>
				<p>new user? <a href=" {{ route('register') }} ">create new account</a></p>

			</div>

  	</form>
	</div>
  <!-- end:Main Form -->
</div>

@stop
