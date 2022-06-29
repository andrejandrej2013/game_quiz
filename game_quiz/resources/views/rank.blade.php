@extends('template.tmp')

@section('content')
    <h1>Rank</h1>
    <table class="ranktable">
        <tr>
            <th>No</th>
            <th>Nickname</th>
            <th>Points</th>
        </tr>
        @foreach($users as $key =>$user)
        <tr>
            <th> {{$key+1}}.</td>
            <td>{{$user->login}} </td>
            <td>{{$user->points}} </td>
        </tr>
        @endforeach
    </table>
@endsection