<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Game Quize</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <!-- <div class="container"> -->
        <div class="row">
            <div class="col">
            
            </div>
            <div class="col-8">
                @if(Auth::check())
                    @include('includes.auth-nav-bar')
                @else 
                    @include('includes.nav-bar')
                @endif 
                <div class='main-cont'>
                    @yield('content')
                </div>
                <div class="container">
                    <header class="bor-top">
                        <p>The authors:</p>
                        <ul>
                            <li>Andrejs Grinevics</li>
                            <li>Marija Kaniveca</li>
                        </ul>
                        @if(Auth::check() and auth()->user()->admin==true)
                        <p><a href="{{route('admin_page')}}">Administrators</a></p>
                        @endif
                    </head>
                </div>

            </div>
            <div class="col">
            </div>
        </div>
    <!-- </div> -->
</body>
</html>