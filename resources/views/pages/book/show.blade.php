@extends('master.master')
@section('title', 'Buku | Edit')
@section('buku', 'active')
@section('content')
<div class="container">
    <div class="cd">
        <div class="cd-hd"><h1>{{ $buku->judul }}</h1></div>
        <div class="cd-bd">
          <div class="">
            <a href="{{ route('buku.index') }}" class="btn btn-primary btn-sm" style="margin-bottom: 20px;"><i class="fa fa-angle-double-left" ></i> Kembali</a>
          </div>
          <br>
          <br>
          <div class="row">
            <div class="col-md-4">
              <img src="{{ asset("cvr/$buku->cover") }}" class="img-fluid">
            </div>
            <div class="col-md-8">
              <table>
                <tr>
                  <td>Judul</td>
                  <td>:</td>
                  <td>{{ $buku->judul }}</td>
                </tr>
                <tr>
                  <td>ISBN</td>
                  <td>:</td>
                  <td>{{ $buku->no_isbn }}</td>
                </tr>
                <tr>
                  <td>ISBN Digital</td>
                  <td>:</td>
                  <td>{{ $buku->no_isbn_digital }}</td>
                </tr>
                <tr>
                  <td>Penerbit</td>
                  <td>:</td>
                  <td>{{ $buku->penulis }}</td>
                </tr>
                <tr>
                  <td>Penerbit</td>
                  <td>:</td>
                  <td>{{ $buku->penerbit }}</td>
                </tr>
                <tr>
                  <td>Tahun Terbir</td>
                  <td>:</td>
                  <td>{{ $buku->tahun_terbit }}</td>
                </tr>
                <tr>
                  <td>Jumlah Halaman</td>
                  <td>:</td>
                  <td>{{ $buku->jumlah_halaman }}</td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>:</td>
                  <td>Rp. {{ $buku->harga }}</td>
                </tr>
                <tr>
                  <td>Jenis</td>
                  <td>:</td>
                  <td>{{ $buku->nama_jenis }}</td>
                </tr>
                <tr>
                  <td>Kategori</td>
                  <td>:</td>
                  <td>{{ $buku->nama_kategori }}</td>
                </tr>
                <tr>
                  <td>Sinopsis</td>
                  <td>:</td>
                  <td>{{ $buku->sinopsis }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="cd-ft">Buku {{ $buku->judul }}</div>
    </div>
    </div>
</div>
@endsection
