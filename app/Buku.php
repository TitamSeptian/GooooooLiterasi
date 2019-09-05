<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    Protected $table = 'bukus';
    Protected $guarded = ['id'];

    public function kategori()
    {
    	return $this->hasMany('App\Kategori');
    }
}
