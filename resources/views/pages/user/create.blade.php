@extends('master.master')
@section('title', 'User | Tambah')
@section('user', 'active')
@section('content')
<div class="container">
    <div class="cd">
        <div class="cd-hd">User</div>
        <div class="cd-bd">
            <div class="">
            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm" style="margin-bottom: 20px;"><i class="fa fa-angle-double-left" ></i> Kembali</a>
          </div>
            <div class="my-form">
              <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <label for="">Nama</label>
                <input type="text" name="name">

                <label for="">Email</label>
                <input type="email" name="email">

                <label for="">Password</label>
                <input type="password" name="password">

                <label>Jenia Kelamin</label>
                <select name="jenis_kelamin" id="">
                  <option value="Laki Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>

                <div class="row">
                  <div class="col-md-4">
                    <label>Tanggal Lahir</label>
                    <select name="tanggal_lahir" id="">
                      @for($i=1; $i <= 31; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                      @endfor
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Bulan Lahir</label>
                    <select name="bulan_lahir" id="">
                      @foreach($bulan as $q)
                        <option value="{{ $q }}">{{ $q }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Tahun Lahir</label>
                    <select name="tahun_lahir" id="">
                      @for($i=1974; $i <= 2019; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                      @endfor
                    </select>
                  </div>
                </div>

                <label>Level</label>
                <select name="level">
                  <option value="user">User</option>
                  <option value="admin">Admin</option>
                </select> 
                <button type="submit text-left">
                  Tambah
                </button>
              </form>
            </div>
        </div>
        <div class="cd-ft">Tambah User</div>
    </div>
</div>
@endsection
@section('script')
@endsection
