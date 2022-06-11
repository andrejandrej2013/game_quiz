@extends('template.tmp')

@section('content')
<h1>Welcome</h1>
<ul>
    @foreach ($categories->all() as $category)
        <li><a href="{{route('level',$category->id)}}">{{ $category->category}}</a></li>
    @endforeach
</ul>
@endsection