<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
</head>
<body>
<a href ="{{route('home')}}">Home</a> -
<a href ="{{route('dashboard')}}">Dashboard</a> -
<a href ="{{route('login')}}">Login</a> -
<a href ="{{route('registration')}}">Registration</a> -
<a href ="{{route('logout')}}">Logout</a>
@yield('content')
</body>
</html>
