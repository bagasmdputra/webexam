<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public $timestamps = false;


    public function user() {
        return $this->belongsTo('User');
    }
}
