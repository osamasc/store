<div class="account col-md-2">
    <div class="info">
      <h4>{{ $user->fullname }}</h4>
      <h5>{{ $user->email }}<h5>
    </div>
    <hr>
    <div class="options">
        <a  href="{{ route('orders') }}"> My Orders</a>
        <a  href="{{ route('addresses')}}"> Shiping addresses</a>
        <a  href="{{ route('lists')}}"> Wish Lists</a>
        <a  href="{{ route('settings')}}"> Account Settings</a>
    </div>
</div>
