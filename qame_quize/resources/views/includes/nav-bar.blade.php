@section('navbar')
<div class="container">
  <header class="d-flex flex-wrap justify-content-center py-3 bor-bottom">
    <a href="{{ route('welcome') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none"><img src="{{URL('/logo.png')}}" alt="logo" class="rounded-circle logo"></a>
    <ul class="nav nav-pills">
      <li class="nav-item"><a href="#" class="nav-link">Rank</a></li>
      <li class="nav-item"><a href="#" class="nav-link">LogIn</a></li>
      <li class="nav-item"><a href="{{ url('reg') }}" class="nav-link">SignIn</a></li>

    </ul>

  </header>
</div>