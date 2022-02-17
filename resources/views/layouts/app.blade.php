<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>Amazing News</title>
</head>
<body class="text-dark">

<input type="hidden" value="{{getHostByName(getHostName())}}" id="ip_address">

<script>
    console.log('IP ADDRESS : ', document.getElementById('ip_address').value)
</script>

@include('layouts.nav')

@yield('content')

@include('layouts.footer')


</body>
</html>