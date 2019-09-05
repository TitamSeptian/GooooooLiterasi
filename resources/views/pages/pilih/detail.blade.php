<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Go ~ Liteasi</title>
		<link rel="shortcut icon" type="image/png" href="{{ asset ('img/favico.png') }}"/>
		<link rel="stylesheet" href="{{ asset ('vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset ('css/general.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset ('css/pilih2.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset ('vendor/wow/animate.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset ('css/result.css') }}">
		<script src="{{ asset ('vendor/wow/wow.min.js') }}"></script>
	</head>
	<body onload="load()">

	<div class="preloader">
    	<img src="{{ asset('img/logo/logo go literasi.png') }}" class="img-preloader">
  	</div>

		<div class="container-me">
			<div class="lc">
				<div class="lc-header item-center">
					<span id="header-title">Buku {{ $buku[0]->judul }}</span>
				</div>
				<div class="lc-body">
					<div class="lc-view">
						<div class="container-me2">
							{{-- <h1>My Result</h1> --}}
							<button class="btn-nx" type="button" onclick="goBack()">Kembali</button>
							@foreach($buku as $b)
								<div class="cd">
									<div class="cd-hd">
										<h4>{{ $b->judul }}</h4>
									</div>
									<div class="cd-bd">
										<div class="text-center" style="width: 100%">
											<img src="{{ asset("cvr/$b->cover") }}" class="img-fluid">
											<h5 style="margin-top: 20px;">{{ $b->judul }}</h5>
										</div>
										<div class="">
											<table class="" style="width: 30%; margin-left: 15%; margin-right:15%;">
											<tr>
												<td>ISBN</td>
												<td>:</td>
												<td>{{ $b->no_isbn }}</td>
											</tr>
											<tr>
												<td>ISBN Digital</td>
												<td>:</td>
												<td>{{ $b->no_isbn_digital }}</td>
											</tr>
											<tr>
												<td>Penulis</td>
												<td>:</td>
												<td>{{ $b->penulis }}</td>
											</tr>
											<tr>
												<td>Penerbit</td>
												<td>:</td>
												<td>{{ $b->penerbit }}</td>
											</tr>
											<tr>
												<td>Tahun Terbit</td>
												<td>:</td>
												<td>{{ $b->tahun_terbit }}</td>
											</tr>
											<tr>
												<td>Harga</td>
												<td>:</td>
												<td>{{ $b->harga }}</td>
											</tr>
											<tr>
												<td>Jumlah Halaman</td>
												<td>:</td>
												<td>{{ $b->jumlah_halaman }}</td>
											</tr>
										</table>
										<div class="text-center" style="width: 100%; margin-top: 50px;">
											<h5>Sinopsis</h5>
											<p>{{ $b->sinopsis }}</p>
										</div>

										</div>
									</div>
								</div>
								@endforeach
							<hr>
							<div class="item-center">
								<p>Unggah Buku</p>
								<br>
								<a href="{{route('my.login')}}"><button class="btn-nx">Unggah</button></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('js/script2.js') }}"></script>
		<script>
			function goBack() {
			  window.history.back();
			}
		</script>
	</body>
</html>