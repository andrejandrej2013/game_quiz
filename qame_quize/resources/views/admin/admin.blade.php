@extends('template.tmp')

@section('content')
<h1>Admin</h1>
<ul>
    <li><a href="{{route('add_foto')}}"> Add Foto</a></li>
    <li><a href="{{route('add_game')}}"> Add Game</a></li>
    <hr>
    <li><a href="{{route('private')}}"> Go back</a></li>
</ul>
@endsection