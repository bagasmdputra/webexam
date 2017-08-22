<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class On_opened_question extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['exam_takens_id','started_at','question_id','user_answer','isMarked','time_taken'];
}
