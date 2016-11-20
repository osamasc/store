@extends('layouts.auth')

@section('title')
Register
@stop

@section('content')

<div  class="text-center" style="padding:50px 0">
	<div class="logo">Register</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="register-form" class="text-left" method="post" action="{{ route('post.reg')}}">
      {{ csrf_field() }}
      <div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="username" class="sr-only">Username</label>
						<input type="text" class="form-control" id="reg_username" name="username" placeholder="username" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="reg_password" name="password" placeholder="password"autocomplete="off">
					</div>
					<div class="form-group">
						<label for="password_confirm" class="sr-only">Password Confirm</label>
						<input type="password" class="form-control" id="reg_password_confirm" name="password_confirmation" placeholder="confirm password" autocomplete="off">
					</div>

					<div class="form-group">
						<label for="email" class="sr-only">Email</label>
						<input type="text" class="form-control" id="reg_email" name="email" placeholder="email" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="fullname" class="sr-only">Full Name</label>
						<input type="text" class="form-control" id="reg_fullname" name="fullname" placeholder="full name" autocomplete="off">
					</div>

					<div class="form-group login-group-checkbox">
						<input type="radio" class="" name="gender" value="1" id="male" placeholder="username">
						<label for="male">male</label>

						<input type="radio" class="" name="gender" value="2" id="female" placeholder="username">
						<label for="female">female</label>
					</div>


				</div>
				<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				@if (count($errors) > 0)
			    <div class="alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
				@endif

				<hr>
				<p>already have an account? <a href="{{ route('login') }}">login here</a></p>

			</div>
		</form>
	</div>
	<!-- end:Main Form -->
</div>



@stop
