@extends('template.tmp')

@section('content')
<div class="center form-div">
    <form action="{{route('add_category')}}" method="post" class="form-reg border-red cut-corners">
        @csrf
        <h1>Add Category</h1>
        <label for="category">Category name</label><br>
        <input type="text" id="category" name="category"><br>
        
        <hr>
        
        <input type="submit" class="submit-butt" value="Submit">
        @if($errors->any())
        <div class="alert alert-danger slow-appearance err-mess">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul class="text-left .cut-corners">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>
        </div>
        @endif
        
    </form>
</div>

<ul>
    <hr>
    <li><a href="{{ route('admin_page') }}"> Go back</a></li>
</ul>
@endsection