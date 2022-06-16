@extends('template.tmp')

@section('content')
<h1>Result</h1>
@if($wrongs)
    <div class="alert alert-danger slow-appearance err-mess">
        <strong>Whoops!</strong><br><br>
        <ul class="text-left .cut-corners">
            @foreach ($wrongs as $wrong)
                <li>{{ $wrong }}</li>
            @endforeach

        </ul>
    </div>
@endif
<div>
    <p>You get...</p>
    <div>{{$user_get}}</div>
    @if(Auth::check())
        <p>Now you have {{auth()->user()->points}}</p>
    @else 
        <p>Unfortunately you need to be authenticated to receive points.</p>
    @endif 

</div>
<div><a href="{{ route('welcome') }}"> Go back</a></div>
@endsection