<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Go ~ Literasi - Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Titam Septian">
  <meta name="description" content="Website membuat user malas membaca menjadi senang membaca">
  <link rel="stylesheet" type="text/css" href="{{ asset ('vendor/bootstrap/css/bootstrap-grid.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset ('css/login.css') }}">
  <link rel="shortcut icon" href="{{ asset ('img/favico.png') }}" />
</head>

<body>
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
        <h1><span>RE</span>GISTER</h1>
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <input type="text" placeholder="Name" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

          <div class="row">
            <div class="col-md-4">
              <select name="tanggal_lahir" id="">
                @for($i=1; $i <= 31; $i++)
                  <option value="{{ $i }}">{{ $i }}</option>
                @endfor
              </select>
            </div>
            <div class="col-md-4">
              <select name="bulan_lahir" id="">
                @foreach($bulan as $q)
                  <option value="{{ $q }}">{{ $q }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4">
              <select name="tahun_lahir" id="">
                @for($i=1974; $i <= 2019; $i++)
                  <option value="{{ $i }}">{{ $i }}</option>
                @endfor
              </select>
            </div>
          </div>
          {{-- <input type="text" placeholder="Regional"> --}}
          <select name="jenis_kelamin" id="">
            <option value="Laki Laki">Laki - Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
          <hr>
          <input type="email" placeholder="Email" name="email">
          <input type="password" placeholder="Password" name="password">
          <button type="submit" name="submit">
            Register
          </button>
        </form>

        <p>Sudah Punya Akun ? <a href="{{ route('my.login') }}" class="link">Login</a></p>
        <div class="bottom-right">
          <img src="{{ asset ('img/master-svg/pat.sv') }}g" alt="">
        </div>
      </div>
    </div>
  </div>
</body>

</html>