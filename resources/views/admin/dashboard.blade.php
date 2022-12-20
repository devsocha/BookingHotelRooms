@extends('admin.skieleton')
@section('content')
<h1>Witaj {{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}} na stronie dashboardu admina</h1>
@endsection
