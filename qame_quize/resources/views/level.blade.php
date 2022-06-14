@extends('template.tmp')

@section('content')
<h1>Level</h1>
<form method="POST" action="{{url('level/$category_id')}}">
@csrf
@foreach (session()->get('level') as $key=>$image)
    <div class="picture"><img src="{{asset('storage/'.$image['image_path'])}}" alt="picture of game" class="guess-level"></div>
    <input type="text" name = "{{$key}}">
@endforeach
    <input type="submit">
    </form>
    @if()
    <div class="alert alert-success text-center"></div>
@endsection