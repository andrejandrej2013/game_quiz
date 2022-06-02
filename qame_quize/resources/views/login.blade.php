@extends('template.tmp')

@section('content')
<div class="center form-div">

    
    <form action="{{route('reg-form')}}" method="post" class="form-reg border-red cut-corners">
        @csrf
        <h1 class="reg">Log in</h1>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password"><br>
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
@endsection