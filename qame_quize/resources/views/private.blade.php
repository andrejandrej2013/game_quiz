@extends('template.tmp')

@section('content')
<h1>It's private user page!</h1>
        <p> 
            <tr>
                <td>My login : </td> 
                <td>{{auth()->user()->login}}</td>
            </tr>
            <tr>
                <td>My E-mail : </td> 
                <td>{{auth()->user()->email}}</td>
            </tr>
            <tr>
                <td>My points : </td> 
                <td>{{auth()->user()->points}}</td>
            </tr>
        </p>
@endsection