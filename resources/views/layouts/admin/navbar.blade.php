<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::to('/') }}">Store</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{ asset('/cpanel/orders')}}">Orders<span class="sr-only">(current)</span></a></li>

        <li><a href="{{ asset('/cpanel/catigories')}}">Catigories</a></li>
        <li><a href="{{ asset('/cpanel/users')}}">Users</a></li>
        <li><a href="{{ asset('/cpanel/products')}}">Products</a></li>
        <li><a href="#">Options</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Illuminate\Support\Facades\Auth::user())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Illuminate\Support\Facades\Auth::user()->fullname }}<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('settings')}}">Account Settings</a></li>
              <li><a href="{{ route('orders')}}">My Orders</a></li>
              <li><a href="{{ route('lists')}}">Wish Lists</a></li>
              <li><a href="{{ route('addresses')}}">shipping-addresses</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ route('logout')}}">logout</a></li>
            </ul>
          </li>
        @else
        <li><a href="{{ route('login')}}">Sign In</a></li>
        @endif

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
