@extends('template.tmp')

@section('content')
<h1>It's private user page!</h1>
        <table class="userpage"> 
            <tr>
                <th>My login : </td> 
                <td>{{auth()->user()->login}}</td>
            </tr>
            <tr>
                <th>My E-mail : </td> 
                <td>{{auth()->user()->email}}</td>
            </tr>
            <tr>
                <th>My points : </td> 
                <td>${{auth()->user()->points}}</td>
            </tr>
</table>

@endsection