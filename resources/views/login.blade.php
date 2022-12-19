@extends('skieleton')
@section('content')
    <form action="{{route('login_check')}}" method="post">
        @csrf
        <div>
            <label> Email</label><br>
            <input type="text" name="email"><br>
            <label> Hasło</label><br>
            <input type="password" name="password"><br><br>
            <input type="submit" value="Zaloguj">
            <a href="{{route('forget_password')}}">Zapomniałeś hasła?</a>
        </div>
    </form>
@endsection
