@extends('master.master')
@section('title', 'Buku | Tambah')
@section('buku', 'active')
@section('content')
<div class="container">
    <div class="cd">
        <div class="cd-hd">Buku</div>
        <div class="cd-bd">
            <div class="">
            <a href="{{ route('buku.index') }}" class="btn btn-primary btn-sm" style="margin-bottom: 20px;"><i class="fa fa-angle-double-left" ></i> Kembali</a>
          </div>
            <div class="my-form">
              <form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data">
                @csrf
                <label for="">Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}">
                <div class="row">
                  <div class="col-md-6">
                    <label for="">No Isbn</label>
                    <input type="text" name="no_isbn" value="{{ old('no_isbn') }}">
                  </div>
                  <div class="col-md-6">
                    <label for="">No Isbn Digital</label>
                    <input type="text" name="no_isbn_digital" value="{{ old('no_isbn_digital') }}">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Penulis</label>
                    <input type="text" name="penulis" value="{{ old('penulis') }}">
                  </div>
                  <div class="col-md-6">
                    <label for="">Penerbit</label>
                    <input type="text" name="penerbit" value="{{ old('penerbit') }}">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label for="">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" min="1"max="1000000" value="{{ old('tahun_terbit') }}">
                  </div>
                  <div class="col-md-4">
                    <label for="">Harga</label>
                    <input type="text" name="harga" value="{{ old('harga') }}">
                  </div>
                  <div class="col-md-4">
                    <label for="">Jumlah Halaman</label>
                    <input type="text" name="jumlah_halaman" min="1" value="{{ old('jumlah_halaman') }}">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>Jenis</label>
                    <select name="jenis">

                      @foreach($jenis as $j)
                      <option value="{{ $j['id'] }}" >{{ $j['nama_jenis'] }}</option>
                      {{-- {{ var_dump($j['nama_jenis']) }} --}}
                      @endforeach

                    </select>
                  </div>
                  <div class="col-md-6">
                    <label>Katgeori</label>
                    <select name="kategori">
                      @foreach($kategori as $k)
                      <option value="{{ $k->id }}" >{{ $k->nama_kategori }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
                <label for="">Sinopsis</label>
                {{-- <input type="text" name="penulis"> --}}
                <textarea name="sinopsis">{{ old('sinopsis') }}</textarea>

                <label>Cover</label>
                <input type="file" name="cover" value="{{ old('cover') }}">
                <button type="submit text-left">
                  Tambah
                </button>
              </form>
            </div>
        </div>
        <div class="cd-ft">Tambah Jenis</div>
    </div>
</div>
@endsection
@section('script')
@endsection
