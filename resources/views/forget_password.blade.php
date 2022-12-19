@extends('skieleton')
@section('content')
    <div>
        <form action="{{route('forget_password_send')}}" method="post">
            @csrf
            <label>Wpisz swój email: </label><br>
            <input type="text" name="email"><br><br>
            <input type="submit" value="Resetuj hasło">
        </form>
    </div>
    <div>
        <a href="{{route('login')}}">Wróć do strony logowania</a>
    </div>

@endsection
