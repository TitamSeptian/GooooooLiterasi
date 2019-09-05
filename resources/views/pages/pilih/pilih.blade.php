<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Go ~ Liteasi</title>
	<link rel="shortcut icon" type="image/png" href="{{ asset ('img/favico.png') }}" />
	<link rel="stylesheet" href="{{ asset ('vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset ('css/general.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset ('css/pilih2.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset ('vendor/wow/animate.css') }}">
	<script src="{{ asset ('vendor/wow/wow.min.js') }}"></script>
</head>

<body onload="load()">

	<div class="preloader">
		<img src="{{ asset('img/logo/logo go literasi.png') }}" class="img-preloader">
	</div>

	<div class="container-me">
		<div class="lc">
			<div class="lc-header item-center">
				<span id="header-title">Jenis Buku</span>
			</div>
			<form action="{{ route('pilih.rs') }}" method="POST">
				@csrf
				<div class="lc-body">
					<div class="lc-view text-center">
						<!-- Control With JS -->
						<div class="lc-b wow fadeIn" data-wow-duration=".7s" data-wow-delay=".2s" data-shot="title1"
							id="first">
							<h1 id="test"></h1>
							<div class="con_chck">
								@foreach($jenis as $j)
								<div class="chck">
									<label>
										<input type="checkbox" name="ck_j[]" value="{{ $j->nama_jenis }}"
											class="myCheckbox">
										<span>{{ $j->nama_jenis }}</span>
									</label>
								</div>
								@endforeach
							</div>
							<div class="btn-board mt-5">
								<a href="{{ url('/') }}"><button type="button" data-target="title2"
										class="btn-nx">Beranda</button></a>
								<button type="button" data-target="title2" class="btn-nx" id="nx-1">Pilih</button>
							</div>
						</div>
						<!-- maksmkamskamksmkas -->
						<div class="lc-b" data-shot="title2" id="second">
							<div class="con_chck">
								@foreach($kategori as $q)
								<div class="chck">
									<label>
										<input type="checkbox" name="ck_k[]" value="{{$q->nama_kategori}}"
											class="my2Checkbox">
										<span>{{$q->nama_kategori}}</span>
									</label>
								</div>
								@endforeach
							</div>
							<div class="btn-board mt-5">
								<button type="button" data-target="title1" class="btn-nx myPrev"
									id="prv-1">Kembali</button>
								<button type="button" data-target="title3" class="btn-nx" id="nx-2">Pilih</button>
							</div>
						</div>
						<!-- jsfjhsjfjhsdjfhsd -->
						<div class="lc-b" data-shot="title3" id="third">
							<div class="row mt-3">
								<div class="col-md-6 mt-3">
									<div class="form">
										<input type="number" placeholder="mis: 50" min="1" id="minimal"
											name="tebal_min">
										<label class="label-form">Minimal</label>
									</div>
								</div>
								<div class="col-md-6 mt-3">
									<div class="form">
										<input type="number" placeholder="mis: 300" id="maksimal" name="tebal_max">
										<label class="label-form">Maksimal</label>
									</div>
								</div>
							</div>
							<div class="btn-board mt-5">
								<button type="button" data-target="title1" class="btn-nx myPrev"
									id="prv-2">Kembali</button>
								<button type="button" data-target="title3" class="btn-nx" id="nx-3">Pilih</button>
							</div>
						</div>
						<div class="lc-b" data-shot="title4" id="fourth">
							<h1>Ini Data Buku</h1>
							<div class="btn-board mt-5">
								<div class="row mt-3">
									<div class="col-md-6 mt-3">
										<div class="form">
											<input type="number" placeholder="mis: 1998" min="1" id="tmin"
												name="tahun_awal">
											<label class="label-form">Tahun</label>
										</div>
									</div>
									<div class="col-md-6 mt-3">
										<div class="form">
											<input type="number" placeholder="mis: 2016" id="tmax" name="tahun_akhir">
											<label class="label-form">Sampai Tahun</label>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form" style="margin-top: 30px;">
											<input type="number" placeholder="Rp. 2000" min="1" max="e"
												name="harga_awal" id="hawal">
											<label class="label-form">Harga Awal</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form" style="margin-top: 30px;">
											<input type="number" placeholder="Rp. 50000" name="harga_akhir" id="hakhir">
											<label class="label-form">Harga Akhir</label>
										</div>
									</div>
								</div>

								<button type="button" data-target="title1" class="btn-nx myPrev" id="prv-3"
									style="margin-top: 30px;">Kembali</button>
								<input type="submit" name="submit" class="btn-nx" value="Temukan">
								{{-- <a href="result.html"><button class="btn-nx">Temukan</button></a> --}}
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('js/script2.js') }}"></script>
	<script>
		new WOW().init();
	</script>
</body>

</html>