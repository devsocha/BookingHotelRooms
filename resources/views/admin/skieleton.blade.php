<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
</head>
<body>
<div>
            <a href ="{{route('dashboard_admin')}}">Dashboard</a> -
            <a href ="{{route('settings_admin')}}">Settings</a> -

            <a href ="{{route('logout_admin')}}">Logout</a>
@yield('content')
</body>
</html>
