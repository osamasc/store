<div class="test">
    asaaaaaaaaaaaaaaaaaaaaa
</div>
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
      <a class="navbar-brand" href="{{ URL::to('/') }}"><strong>WhiteStore</strong></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#"><span class="sr-only">(current)</span></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Illuminate\Support\Facades\Auth::check())

        <li><a href="{{ asset('/account/orders')}}">
           My Orders <i class="fa fa-shopping-bag"></i>
          <span class="badge"></span>
        </a></li>

        <li><a href="{{ asset('/cart')}}">
          Shopping Cart
          <span class="badge">

            <i class="fa fa-shopping-cart"></i> <strong>

              @if(@$cartCount > 0)
              {{@$cartCount}}
              @endif

            </strong>
          </span>
        </a></li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa "></i> {{ Illuminate\Support\Facades\Auth::user()->fullname }}<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('settings')}}">Account Settings</a></li>
              <li><a href="{{ route('orders')}}">My Orders</a></li>
              <li><a href="{{ route('lists')}}">Wish Lists</a></li>
              <li><a href="{{ route('addresses')}}">shipping-addresses</a></li>
              <li><a href="{{ route('products')}}">Wanna Offer Something?</a></li>
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
