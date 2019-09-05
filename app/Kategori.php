<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
	Protected $table = 'kategoris';
    Protected $guarded = [
    	'id'
    ];
    public function bukus()
    {
    	return $this->belongsTo('App\Buku');
    }
}
