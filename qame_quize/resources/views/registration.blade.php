@extends('template.tmp')

@section('content')
<div class="center form-div">

    
    <form action="{{route('reg-form')}}" method="post" class="form-reg border-red cut-corners">
        @csrf
        <h1 class="reg">Sign up</h1>
        <label for="fname">First name</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Last name</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="login">Login</label><br>
        <input type="text" id="login" name="login"><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="date">Date of birth</label><br>
        <input type="date" id="date" name="date"><br>
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