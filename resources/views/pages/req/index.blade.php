@extends('master.master')
@section('title', '| Request')
@section('request', 'active')
@section('content')
<div class="container">
    <div class="cd">
        <div class="cd-hd">Request</div>
        <div class="cd-bd">
          <div class="text-left">
            <a href="{{ route('pdf.lap') }}" class="btn btn-outline-primary" style="margin-bottom: 26px;"><i class="fa fa-download"></i>&nbsp;Download Laporan</a>
          </div>
          <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
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
            </table>
        </div>
        </div>
        <div class="cd-ft">Jenis Buku</div>
    </div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function(){
       $('#table').DataTable({
            responsive: true,
            // processing:true,
            // serverSide:true,
            ajax: "{{ route('req.data') }}",
            columns : [
                 {data: "DT_RowIndex", orderable: false, searchable: false},
                 {data: "jenis"},
                 {data: "kategori"},
                 {data: "tebal_min"},
                 {data: "tebal_max"},
                 {data: "harga_awal"},
                 {data: "harga_akhir"},
                 {data: "tahun_awal"},
                 {data: "tahun_akhir"},
                 {data: "created_at"},
            ]
       });  
  });
</script>
@endsection
