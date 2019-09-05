<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    Protected $table = 'requests';
    Protected $guarded = ['id'];
}
