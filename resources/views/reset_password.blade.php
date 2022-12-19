@extends('skieleton')
@section('content')
    <div>
        <form action="{{route('reset_password')}}" method="post">
            @csrf
            <input type="hidden"value="{{$token}}" name="token">
            <input type="hidden"value="{{$email}}" name="email">
            <label>Wpisz nowe hasło </label><br>
            <input type="password" name="password"><br>
            <label>Wpisz ponownie nowe hasło </label><br>
            <input type="password" name="retypePassword"><br><br>
            <input type="submit" value="Resetuj hasło">
        </form>
    </div>
    <div>
        <a href="{{route('login')}}">Wróć do strony logowania</a>
    </div>

@endsection
