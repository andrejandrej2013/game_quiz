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
<ul>
    @foreach ($categories->all() as $category)
        <li><a href="{{route('level',$category->id)}}">{{ $category->category}}</a></li>
    @endforeach
</ul>
@endsection