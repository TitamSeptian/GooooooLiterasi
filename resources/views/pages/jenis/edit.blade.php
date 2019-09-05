@extends('master.master')
@section('title', 'Jenis | Edit')
@section('jenis', 'active')
@section('content')
<div class="container">
    <div class="cd">
        <div class="cd-hd">Jenis</div>
        <div class="cd-bd">
            <div class="">
            <a href="{{ route('jenis.index') }}" class="btn btn-primary btn-sm" style="margin-bottom: 20px;"><i class="fa fa-angle-double-left" ></i> Kembali</a>
          </div>
            <div class="my-form">
              <form method="POST" action="{{ route('jenis.update', $jenis->id) }}">
                @csrf
                {{ method_field('PUT') }}
                <label for="">Nama Jenis</label>
                <input type="text" name="nama_jenis" value="{{ $jenis->nama_jenis }}">
                <button type="submit text-left">
                  Edit
                </button>
              </form>
            </div>
        </div>
        <div class="cd-ft">Edit Jenis</div>
    </div>
</div>
@endsection
@section('script')
@endsection
