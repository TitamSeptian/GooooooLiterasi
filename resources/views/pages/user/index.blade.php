@extends('master.master')
@section('title', '| User')
@section('user', 'active')
@section('content')
<div class="container">
    <div class="cd">
        <div class="cd-hd">User</div>
        <div class="cd-bd">
          <div class="text-left">
            <a href="#" class="btn btn-success" style="margin-bottom: 26px;" id="addUser">
                <i class="fa fa-plus"></i>&nbsp;Tambah
            </a>&nbsp;&nbsp;
            {{-- <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST"> --}}
            <form id="logout-form" action="{{ route('my.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-success float-left" style="margin-bottom: 26px;" id="register">Register</button>
            </form>
            {{-- <a href="{{ route('my.register') }}" class="btn btn-outline-success" style="margin-bottom: 26px;" id="register">
                <i class="fa fa-plus"></i>&nbsp;Register
            </a> --}}
          </div>
          <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
          </div>
        </div>
        <div class="cd-ft">Jenis Buku</div>
    </div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function(){
    $('#register').hide();
       $('#table').DataTable({
            responsive: true,
            // processing:true,
            // serverSide:true,
            ajax: "{{ route('user.data') }}",
            columns : [
                 {data: "DT_RowIndex", orderable: false, searchable: false},
                 {data: "name"},
                 {data: "jenis_kelamin"},
                 {data: "email"},
                 {data: "level"},
                 {data: "action", orderable:false, searchable:false},
            ]
       });
       $('#addUser').on('click', function(e) {
           alert('Untuk Menambahkan User & Admin silahkan Register Melalui Form Register');
           $('#register').fadeIn();
           /* Act on the event */
       });
  });
</script>
@endsection
