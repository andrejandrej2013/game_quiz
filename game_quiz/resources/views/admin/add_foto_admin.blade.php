@extends('template.tmp')

@section('content')
<h1>Add Foto</h1>
<div class="center form-div">
    <form action="{{route('add_foto')}}" enctype="multipart/form-data" method="post" class="form-reg border-red cut-corners">
        @csrf
        <h1>Add Image</h1>
        <label for="game_id">Choose a game:</label><br>
        <select id="game_id" name="game_id">
            @foreach ($games as $game)
                <option value="{{$game->id}}">{{$game->name}}</option>
            @endforeach
        </select>
        
        <br>
        <label for="image">Image</label><br>
        <input type="file" id="image" name="image" class="form-control form-control-sm file-upload"><br>
        
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
    <ul>
        <hr>
        <li><a href="{{ route('admin_page') }}"> Go back</a></li>
    </ul>
</div>
@endsection