@extends('template.tmp')

@section('content')
<h1>Level</h1>
<form method="POST" action="{{url('level/$category_id')}}">
@csrf

@foreach (session()->get('level') as $key=>$image)
<div class="picture">
    <div class=""><img src="{{asset('storage/'.$image['image_path'])}}" alt="picture of game" class="guess-level"></div>
    <input type="text" name = "{{$key}}">
    </div>
@endforeach
    <input type="submit">
    </form>
@endsection