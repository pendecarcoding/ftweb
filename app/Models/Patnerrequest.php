<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patnerrequest extends Model
{
  //
  protected $fillable = [
    'name',
    'contact',
    'email',
    'subject',
    'message',
   ];
}
