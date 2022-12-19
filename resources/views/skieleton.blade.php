<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
</head>
<body>
<div>
    <a href ="{{route('home')}}">Home</a> -
    @if(Auth::guard('web')->user())
        <a href ="{{route('dashboard')}}">Dashboard</a> -
        <a href ="{{route('logout')}}">Logout</a>
    @endif
    @if(!Auth::guard('web')->user())
        <a href ="{{route('login')}}">Login</a> -
        <a href ="{{route('registration')}}">Registration</a>
    @endif

</div>
@yield('content')
</body>
</html>
