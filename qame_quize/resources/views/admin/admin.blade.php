@extends('template.tmp')

@section('content')
<div class="adminbuttons">
<h1>Admin</h1>
<ul>
    <li><a href="{{route('foto_page')}}"> Add Foto</a></li>
    <li><a href="{{route('game_page')}}"> Add Game</a></li>
    <li><a href="{{route('category_page')}}"> Add Category</a></li>
    <li><a href="{{route('join_page')}}"> Add Join (Game-Catecory)</a></li>

</ul></div>
@endsection