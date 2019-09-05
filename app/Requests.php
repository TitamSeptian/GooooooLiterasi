<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    Protected $table = 'requests';
    Protected $guarded = ['id'];
}
