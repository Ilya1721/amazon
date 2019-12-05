<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
   integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
   integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
   integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="/css/app.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
   integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="background: #d3d3d3">
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
      <div class="container">
          <a id="brand" class="navbar-brand" href="{{ url('/') }}">
            <img id="navbar-image" src="/images/navbar-image.png" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse"
           data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a id="nav-link" class="nav-link text-white" href="/home">
                    Cabinet
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/cart" class="nav-link">
                    <img id="navbar-image" src="/images/shopping_cart.png" />
                  </a>
                </li>
              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
                      <li class="nav-item">
                          <a id="link" class="nav-link text-white"
                           href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a id="link" class="nav-link text-white"
                               href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link text-white
                           links dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                              {{ Auth::user()->name }}
                              <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right"
                           aria-labelledby="navbarDropdown">
                              <a class="dropdown-item"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}"
                               method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
          </div>
      </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer id="sticky-footer" class="py-4 bg-dark page-footer text-white">
      <div class="container text-center">
        <small>Copyright &copy; Amazon</small>
      </div>
    </footer>
  </div>
</body>
</html>
