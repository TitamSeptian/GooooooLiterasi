@extends('master.master')
@section('title', '| Buku')
@section('buku', 'active')
@section('content')
<div class="container">
    <div class="cd">
        <div class="cd-hd">Buku</div>
        <div class="cd-bd">
          <div class="text-left">
            <a href="{{ route('buku.create') }}" class="btn btn-success" style="margin-bottom: 26px;"><i class="fa fa-plus"></i>&nbsp;Tambah</a>
          </div>
          <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered " style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
            </table>
          </div>
        </div>
        <div class="cd-ft">Buku</div>
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
            ajax: "{{ route('buku.data') }}",
            columns : [
                 {data: "DT_RowIndex", orderable: false, searchable: false},
                 {data: "img"},
                 {data: "judul"},
                 {data: "penulis"},
                 {data: "action", orderable:false, searchable:false},
            ]
       });  
  });
</script>
@endsection
{{-- 
ksjka

BELUM JADI SEMUA MASIH SALAH
 --}}