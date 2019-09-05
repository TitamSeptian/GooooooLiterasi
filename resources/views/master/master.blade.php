<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Go ~ Literasi @yield('title')</title>

    <!-- Scripts -->

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/font-awesome2/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/side.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favico.png') }}"/>
    @yield('style')
</head>
<body onload="load()">

  <div class="preloader">
    <img src="{{ asset('img/logo/logo go literasi.png') }}" class="img-preloader">
  </div>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Go ~ Literasi
                </a>
                <span style="cursor:pointer" class="navbar-brand" onclick="openNav()">&#9776;</span>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <!-- <img src="img/ps.png" alt="user" class="ml-2 mr-2 rounded"> -->
                  <div class="row ml-2">
                      <div class="col-md-3">
                          <div class="av-admin"></div>
                      </div>
                      <div class="col-md-9 info-user">
                          <span>{{ Auth::user()->name }}</span>
                          <hr>
                          <span>{{ Auth::user()->level }}</span>
                      </div>
                  </div>
                  @if(Auth::user()->level == 'admin')
                  <a href="{{ route('side.dash') }}" class="side-menu mt-2 @yield('dashboard')">Dashboard</a>
                  @endif

                  <a href="{{ route('buku.index') }}" class="side-menu @yield('buku') {{ Auth::user()->level == 'user' ? 'mt-2' : '' }}">Buku</a>
                  <a href="{{ route('jenis.index') }}" class="side-menu @yield('jenis')">Jenis buku</a>
                  <a href="{{ route('kategori.index') }}" class="side-menu @yield('kategori')">Kategori Buku</a>
                  {{-- admin --}}
                  @if(Auth::user()->level == 'admin')
                  <a href="{{ route('req.index') }}" class="side-menu @yield('request')">Request</a>
                  <a href="{{ route('user.index') }}" class="side-menu @yield('user')">User</a>
                  @endif

                  <a href="{{ route('pilih') }}" class="side-menu">Mulai</a>
                  <a href="{{ route('about') }}" class="side-menu">About</a>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                  
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="http://127.0.0.1:8000/logout"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" onclick="closeNav()">
          <div class="container">
            @if ($errors->any()) 
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><h4>Opps</h4></strong><br>
                <ul>
                    @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                    @endforeach 
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @elseif (session('msgSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong><h4>Sukses!</h4></strong><br>
              {{ session('msgSuccess') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @elseif(session('msgWarning'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong><h4>Warning!</h4></strong><br>
              {{ session('msgWarning') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          </div>
            @yield('content')
        </main>
        
        <!-- <div class="foot">
            <p>9889 Web Design &copy;2019</p>
        </div> -->
    </div>
    {{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('vendor/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables//dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/script2.js') }}"></script>
    @yield('script')
</body>
</html>
