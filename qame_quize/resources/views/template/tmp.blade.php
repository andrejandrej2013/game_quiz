<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Quize</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('includes.nav-bar')
    <!-- <div class="container"> -->
        <div class="row">
            <div class="col">
            1 of 3
            </div>
            <div class="col-8"style="border-left: 1px solid;border-right: 1px solid;">
                @yield('content')
            
            </div>
            <div class="col">
            3 of 3
            </div>
        </div>
    <!-- </div> -->
</body>
</html>