@extends('template.tmp')

@section('content')
    <h1>Rank</h1>
    @foreach($users as $user)
        <tr>
            <td>${{$user->points}} </td>
            <td>{{$user->login}} </td>
        </tr>
    @endforeach
@endsection