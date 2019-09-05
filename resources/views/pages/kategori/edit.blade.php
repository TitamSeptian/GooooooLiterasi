@extends('master.master')
@section('title', 'Kategori | Edit')
@section('kategori', 'active')
@section('content')
<div class="container">
    <div class="cd">
        <div class="cd-hd">Kategori</div>
        <div class="cd-bd">
          <div class="">
            <a href="{{ route('kategori.index') }}" class="btn btn-primary btn-sm" style="margin-bottom: 20px;"><i class="fa fa-angle-double-left" ></i> Kembali</a>
          </div>
            <div class="my-form">
              <form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
                @csrf
                {{ method_field('PUT') }}
                <label for="">Nama Kategori</label>
                <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}">
                <button type="submit text-left">
                  Edit Kategori
                </button>
              </form>
            </div>
        </div>
        <div class="cd-ft">Edit Kategori</div>
    </div>
</div>
@endsection
@section('script')
{{-- <script>
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
</script> --}}
@endsection
