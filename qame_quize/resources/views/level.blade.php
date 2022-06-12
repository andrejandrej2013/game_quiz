@extends('template.tmp')

@section('content')
<h1>Level</h1>
@foreach ($images as $image) 
    <div class="picture"><img src="{{asset('storage/'.$image->foto)}}" alt="picture of game" class="guess-level"></div>
@endforeach
@endsection