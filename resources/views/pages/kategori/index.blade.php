@extends('master.master')
@section('title', '| Kategori')
@section('kategori', 'active')
@section('content')
<div class="container">
  
    <div class="cd">
        <div class="cd-hd">Kategori</div>
        <div class="cd-bd">
          <div class="text-left">
            <a href="{{ route('kategori.create') }}" class="btn btn-success" style="margin-bottom: 26px;"><i class="fa fa-plus"></i>&nbsp;Tambah</a>
          </div>
          <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
          </div>
        </div>
        <div class="cd-ft">Kategori Buku</div>
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
            ajax: "{{ route('kategori.data') }}",
            columns : [
                 {data: "DT_RowIndex", orderable: false, searchable: false},
                 {data: "nama_kategori"},
                 {data: "action", orderable:false, searchable:false},
            ]
       });  
  });
</script>
@endsection
