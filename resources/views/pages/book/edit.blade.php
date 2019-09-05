@extends('master.master')
@section('title', 'Buku | Edit')
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
              <form method="POST" action="{{ route('buku.update',$buku->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <img src="{{ asset("cvr/$buku->cover") }}" class="img-fluid">
                <br>
                <br>
                <label for="">Judul</label>
                <input type="text" name="judul" value="{{ $buku->judul }}">
                <div class="row">
                  <div class="col-md-6">
                    <label for="">No Isbn</label>
                    <input type="text" name="no_isbn" value="{{ $buku->no_isbn }}">
                  </div>
                  <div class="col-md-6">
                    <label for="">No Isbn Digital</label>
                    <input type="text" name="no_isbn_digital" value="{{ $buku->no_isbn_digital }}">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Penulis</label>
                    <input type="text" name="penulis" value="{{ $buku->penulis }}">
                  </div>
                  <div class="col-md-6">
                    <label for="">Penerbit</label>
                    <input type="text" name="penerbit" value="{{ $buku->penerbit }}">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label for="">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" min="1"max="1000000" value="{{ $buku->tahun_terbit }}">
                  </div>
                  <div class="col-md-4">
                    <label for="">Harga</label>
                    <input type="text" name="harga" value="{{ $buku->harga }}">
                  </div>
                  <div class="col-md-4">
                    <label for="">Jumlah Halaman</label>
                    <input type="text" name="jumlah_halaman" min="1" value="{{ $buku->jumlah_halaman
                     }}">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>Jenis</label>
                    <select name="jenis">
                      @foreach($jenis as $j)
                      <option value="{{ $j->id }}" {{ $buku->jenis_id == $j->id ? 'selected' : '' }}>{{ $j->nama_jenis }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label>Katgeori</label>
                    <select name="kategori">
                      @foreach($kategori as $k)
                      <option value="{{ $k->id }}" {{ $buku->kategori_id == $j->id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
                <label for="">Sinopsis</label>
                {{-- <input type="text" name="penulis"> --}}
                <textarea name="sinopsis">{{ $buku->sinopsis }}</textarea>

                <label>Cover</label>
                <input type="file" name="cover">
                <input type="hidden" name="cover_hidden" value="{{ $buku->cover }}">
                <button type="submit text-left">
                  Edit
                </button>
              </form>
            </div>
        </div>
        <div class="cd-ft">Edit Buku</div>
    </div>
</div>
@endsection
@section('script')
@endsection
