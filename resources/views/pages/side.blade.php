@extends('master.master')
@section('content')
  <div class="container">
    <div class="row">
    @if(Auth::user()->level == 'admin' )
        <div class="col-md-4">
            <div class="cd">
                <div class="cd-hd">Permintaan Per-Tahun</div>
                <div class="cd-bd">
                    <h1 class="display-5">{{ $tahun }}</h1>
                </div>
                <div class="cd-ft">Year</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="cd">
                <div class="cd-hd">Permintaan Bulan Ini</div>
                <div class="cd-bd">
                    <h1 class="display-5">{{ $bulan }}</h1>
                </div>
                <div class="cd-ft">Month</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="cd">
                <div class="cd-hd">Permintaan Hari Ini</div>
                <div class="cd-bd">
                    <h1 class="display-5">{{ $hari_ini }}</h1>
                </div>
                <div class="cd-ft">Today</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="cd">
                <div class="cd-hd">Banyak Buku</div>
                <div class="cd-bd">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Buku Masuk Hari ini</p>
                            <h1 class="display-5">{{ $buku_hari_ini }}</h1>
                        </div>
                        <div class="col-md-6">
                            <p>Seluruh Buku</p>
                            <h1 class="display-5">{{ $buku }}</h1>
                        </div>
                    </div>
                    
                </div>
                <div class="cd-ft">Buku</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="cd">
                <div class="cd-hd">Banyak User</div>
                <div class="cd-bd">
                    <div class="row">
                        <div class="col-md-6">
                            <p>User Terdaftar Hari ini</p>
                            <h1 class="display-5">{{ $user_hari_ini }}</h1>
                        </div>
                        <div class="col-md-6">
                            <p>Seluruh User</p>
                            <h1 class="display-5">{{ $user }}</h1>
                        </div>
                    </div>
                </div>
                <div class="cd-ft">User</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="cd">
                <div class="cd-hd">Jenis dan Kategori</div>
                <div class="cd-bd">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Jenis</p>
                            <h1 class="display-5">{{ $jenis }}</h1>
                        </div>
                        <div class="col-md-6">
                            <p>Kategori</p>
                            <h1 class="display-5">{{ $kategori }}</h1>
                        </div>
                    </div>
                </div>
                <div class="cd-ft">Jenis dan Kategori</div>
            </div>
        </div>
        @elseif(Auth::user()->level == 'user')
            <div class="col-md-12">
                <div class="cd">
                    <div class="cd-hd">
                        <h4>Go Literasi</h3>
                    </div>
                    <div class="cd-bd">
                        <h1 class="display4">Selamat Datang di <b>Go Literasi</b></h1><br>
                        <h3>Silahkan Pilih Menu</h3>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
