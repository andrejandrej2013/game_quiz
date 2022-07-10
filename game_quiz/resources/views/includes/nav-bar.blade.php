@section('navbar')
    <div class="px-5 red">
        <nav class="d-flex flex-wrap justify-content-center py-1 ">
        <a href="{{ route('welcome') }}" class="d-flex align-items-center mb-md-0 me-md-auto nav-link head">Game Quiz</a>
        <ul class="nav nav-pills flex-nowrap align-items-center">
          <li class="nav-item"><a href="{{route('rank')}}" class="nav-link">Rank</a></li>
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
          <li class="nav-item"><a href="{{ route('registration') }}" class="nav-link">Sign up</a></li>

        </ul>
        </nav>
    </div>
