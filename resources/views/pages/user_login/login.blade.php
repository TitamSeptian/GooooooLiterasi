<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Go ~ Literasi - Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Titam Septian">
  <meta name="description" content="Website membuat user malas membaca menjadi senang membaca">
  {{-- <link rel="shortcut icon" href="{{ asset ('css/vendor/bootstrap/bootstrap-grid.min.css') }}" /> --}}
  <link rel="shortcut icon" href="{{ asset ('img/favico.png') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset ('css/login.css') }}">
</head>

<body>

  @guest


  <div class="container-login">
    <div class="left">
      <div class="caption">
        <a href="index.html">
          <img src="{{ asset ('img/icon_hijau.png') }}">
          <h1>Go ~ Literasi</h1>
        </a>
        <p>
          Meningkatkan Angka Literasi dengan Buku Seuai Yang Mereka Suka
        </p>
      </div>
    </div>
    <div class="right">
      <div class="content">
        <h1><span>SI</span>GN IN</h1>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <input type="email" placeholder="Email" class="@error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus>

          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

          <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="current-password">

          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

          <button type="submit">
            Sign In
          </button>
        </form>
        <p>Belum Punya Akun ? <a href="{{ route('my.register') }}" class="link">Daftar</a></p>
        <div class="bottom-right">
          <img src="{{ asset ('img/master-svg/pat.svg') }}" alt="">
        </div>
      </div>
    </div>
  </div>
  @endguest
</body>

</html>