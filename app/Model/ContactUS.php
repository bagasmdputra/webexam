<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactUS extends Model
{

public $table = 'contactus';

public $fillable = ['name','email','message'];

}
