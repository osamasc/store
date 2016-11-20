<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') | store.com</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" media="screen" title="no title">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu|Varela+Round|Baloo+Tamma|itillium+Web" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Tamma|Titillium+Web" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/master.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">

    </head>

    <body>

      @include('includes/navbar')
      
        <div class="container">
          @yield('content')
        </div>


        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="{{ URL::to('js/app.js') }}"></script>
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
          integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
          crossorigin="anonymous">
        </script>
        <script type="text/javascript">
        @if(notify()->ready())
            swal({
              title: "{{ notify()->message()}}",
              type: "{{ notify()->type()}}",
              @if (notify()->option('timer'))
              timer: "{{ notify()->option('timer') }}"
              @endif
            })
        @endif
        </script>
    </body>
</html>
