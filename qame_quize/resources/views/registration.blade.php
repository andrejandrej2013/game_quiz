@extends('template.tmp')

@section('content')
<form action="">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname"><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname"><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>
    <label for="date">Date of birth:</label><br>
    <input type="date" id="date" name="date"><br>

    
    <input type="submit" value="Submit">

</form>
@endsection