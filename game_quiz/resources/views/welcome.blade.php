@extends('template.tmp')

@section('content')
<h1>Welcome</h1>
@if($errors->any())
    <div class="alert alert-danger slow-appearance err-mess">
        <strong>Whoops!</strong> There were some problem.<br><br>
        <ul class="text-left .cut-corners">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    </div>
@endif

    <div class="categories">
        @foreach ($categories->all() as $category)
            <div class="list-categories"><a href="{{route('level',$category->id)}}"># {{ ucwords($category->category)}}</a></div>
        @endforeach
    </div>

@endsection