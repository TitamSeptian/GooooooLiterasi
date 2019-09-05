@extends('master.master')
@section('title', 'User | Edit')
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
              <form method="POST" action="{{ route('update2', $user->id) }}">
                @csrf
                {{ method_field('PUT') }}
                {{-- <label for="">Nama</label>
                <input type="text" name="name" value="{{ $user->name }}">

                <label for="">Email</label>
                <input type="email" name="email" value="{{ $user->email }}"> --}}

                {{-- <label for="">Password</label>
                <input type="password" name="password" value="{{ $user->password }}"> --}}
                {{-- <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" id="">
                  <option value="Laki Laki" {{ $user->jenis_kelamin == 'Laki Laki' ? 'selected' : '' }}>Laki - Laki</option>
                  <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>

                <div class="row">
                  <div class="col-md-4">
                    <label>Tanggal Lahir</label>
                    <select name="tanggal_lahir" id="">
                      @for($i=1; $i <= 31; $i++)
                        <option value="{{ $i }}" {{ $user->tanggal_lahir == $i ? 'selected' : '' }}>{{ $i }}</option>
                      @endfor
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Bulan Lahir</label>
                    <select name="bulan_lahir" id="">
                      @foreach($bulan as $q)
                        <option value="{{ $q }}" {{ $user->bulan_lahir == $q ? 'selected' : '' }}>{{ $q }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Tahun Lahir</label>
                    <select name="tahun_lahir" id="">
                      @for($i=1974; $i <= 2019; $i++)
                        <option value="{{ $i }}" {{ $user->tahun_lahir == $i ? 'selected' : '' }}>{{ $i }}</option>
                      @endfor
                    </select>
                  </div>
                </div> --}}

                <label>Level</label>
                <select name="level">
                  <option value="user" {{ $user->level == 'user' ? 'selected' : '' }}>User</option>
                  <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin</option>
                </select> 
                <button type="submit text-left">
                  edit
                </button>
              </form>
            </div>
        </div>
        <div class="cd-ft">Edit User</div>
    </div>
</div>
@endsection
@section('script')
@endsection
