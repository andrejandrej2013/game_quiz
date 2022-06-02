@extends('template.tmp')

@section('content')
<div class="center registration-form">

    
    <form action="{{route('reg-form')}}" method="post">
        @csrf
        <h1 class="reg">Sign-in</h1>
        <label for="fname">First name</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Last name</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="date">Date of birth</label><br>
        <input type="date" id="date" name="date"><br>
        <hr>


        
        <input type="submit" class="submit-butt" value="Submit">

    </form>
    @if($errors->any())
    <div class="alert alert-danger slow-appearance">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul class="text-left">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    </div>
    @endif
</div>
@endsection