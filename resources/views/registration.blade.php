@extends('skieleton')
@section('content')
    <form action="{{route('registration_save')}}" method="post">
        @csrf
        <div>
            <label> Imie i nazwisko</label><br>
            <input type="text" name="name"><br>
            <label> Email</label><br>
            <input type="text" name="email"><br>
            <label> Hasło</label><br>
            <input type="password" name="password"><br>
            <label> Powtórz hasło</label><br>
            <input type="password" name="reTypePassword"><br><br>
            <input type="submit" value="Zarejestruj">
        </div>
    </form>
@endsection
