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
			<img src="{{ asset('img/logo/logo go literasi.png') }}" alt="" class="img-preloader">
		</div>

		<div class="container-me">
			<div class="lc">
				<div class="lc-header item-center">
					<span id="header-title">Buku Telah Temukan</span>
				</div>
				<div class="lc-body">
					<div class="lc-view">
						<div class="container-me2">
							{{-- <h1>My Result</h1> --}}
						<a href="{{ route('pilih') }}"><button class="btn-nx">Pilih Lagi</button></a>	
								@if(count($buku) > 0)
							<div class="row">
								{{-- {{count($buku) > 0 ? true : 'false' }}
 --}}
								{{-- @if($res == 0) --}}
								@foreach($buku as $b)
								<div class="col-md-4 mt-3 wow fadeIn"  data-wow-duration=".7s" data-wow-delay=".2s">
									<div class="cd"style="height: 100%" >
										<div class="cd-hd">
											<h4>{{ $b->judul }}</h4>
										</div>
										<div class="cd-bd" >
											<img src="{{ asset("cvr/$b->cover") }}" class="img-fluid">
											<h5 style="margin-top: 20px;">{{ $b->judul }}</h5>
											<table>
												<tr>
													<td>Penulis</td>
													<td>:</td>
													<td>{{ $b->penulis }}</td>
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
										</div>
										<div class="">
											<a href="{{ route('pilih.detail', $b->id) }}"><button class="btn-nx">Lihat</button></a>
										</div>
									</div>
								</div>
								@endforeach
								{{-- @endif --}}
							</div>
								@else
								<div class="item-center" style="width: 100%">
									{{-- <div class="text-center" style="width: 20%; height: 20%;"> --}}
										<h2>Buku Tidak di Temukan.</h2>
										<img src="{{ asset('img/404.png') }}" class="img-fluid" style="width: 20%; height: 20%;">
									{{-- </div> --}}
								</div>
								
								@endif
							<hr>
							<div class="item-center">
								<p>Unggah Buku</p>
								<br>
								<a href="{{ url('/') }}"><button class="btn-nx">Beranda</button></a>
								<a href="{{ route('my.login') }}"><button class="btn-nx">Unggah</button></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('js/script2.js') }}"></script>
		<script>
			new WOW().init();
		</script>
	</body>
</html>