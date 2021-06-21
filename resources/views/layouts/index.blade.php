
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" >
    <link rel="icon" type="image/png" href="{{ asset('img/bec-logo.png') }}" />

   <title>@yield('title')</title>
</head>
<body>
@yield('content')


<script src="{{asset('js/app.js')}}"></script>


</body>
</html>

