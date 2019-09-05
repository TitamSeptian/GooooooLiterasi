@extends('master.master')
@section('content')
<div class="container">
	<div class="cd">
		<div class="cd-hd">
			<h2>WHO I AM?</h2>
		</div>
		<div class="cd-bd text-center">
			{{-- <div class="">me</div> --}}
			{{-- <img src="{{ asset('img/author/me.jpeg') }}" class="rounded-circle mt-3" width="200" height="200">
			<h2 class="mt-2"><b>SEPTIAN DWI PUTRA PRADIPTA</b></h2>
			<div class="text-left mt-2">
				<div class="container">
					<p>
						Nama saya Septian Dwi Putra Pradipta saya adalah seorang pelajar di SMK Negeri 1 Subang  
					</p>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum sint odio labore explicabo nam dolorum doloremque nemo ullam maiores hic vel ipsum, soluta reiciendis aliquam repudiandae esse iste, distinctio debitis!
					</p>
				</div>
			</div> --}}
			<div class="row">
				<div class="col-md-6">
					<img src="{{ asset('img/author/me.jpeg') }}" class="img-fluid rounded-circle mr-4" width="400" height="400">
				</div>
				<div class="col-md-6 text-left">
					<h2>Hai, Saya Septian Dwi Putra Pradipta</h2>
					<ol>Pelajar</ol>
					<br>
					<h2>Temukan Saya</h2>
					<div class="about">
						<a href="https://web.facebook.com/profile.php?id=100008628197338" target="_blank"><i class="fa fa-facebook"></i></a>
						<a href="https://instagram.com/titam9889" target="_blank"><i class="fa fa-instagram"></i></a>
						<a href="https://twitter.com/titam9889" target="_blank"><i class="fa fa-twitter"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="cd-ft">
			About
		</div>
	</div>
</div>
@endsection
