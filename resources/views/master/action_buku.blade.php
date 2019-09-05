<a href="{{ $url_show }}" class="btn-show"><i class="fa fa-eye text-primary"></i></a>
@if(Auth::user()->level == 'admin')
|
<a href="{{ $url_edit }}" class="modal-show"><i class="fa fa-pencil text-inverse"></i></a>
|
<a href="{{ $url_destroy }}" class="btn-delete"><i class="fa fa-trash text-danger"></i></a>
@endif