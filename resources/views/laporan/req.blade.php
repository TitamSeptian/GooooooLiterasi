<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
	<table class="table table-sm">
	  <caption>Semua Request</caption>
	 <thead>
	    <tr>
	      	<th scope="col">No</th>
            <th>Jenis</th>
            <th>Kategori</th>
            <th>Tebal Minimal</th>
            <th>Tebal Maximal</th>
            <th>Harga Minimal</th>
            <th>Harga Maximal</th>
            <th>Tahun Awal</th>
            <th>Tahun Akhir</th>
            <th>Request</th>
	    </tr>
	</thead>
	<tbody>
		{{-- @php $i = 1 @endphp
		@foreach($req as $q)
	    <tr>
	      	<th scope="row">{{ $i++ }}</th>
	      	<th>{{ $q['jenis'] }}</th>
	    </tr>
	    @endforeach --}}
	</tbody>
	</table>
</body>
</html>