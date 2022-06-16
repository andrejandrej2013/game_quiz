@extends('template.tmp')

@section('content')
    <h1>Rank</h1>
    <ol>
    @foreach($users as $user)
        <li>
            <p><tr>
                <tр>{{$user->points}} </td>
                <td>{{$user->login}} </td>
            </tr></p>
        </li>
    @endforeach
    <ol>
@endsection