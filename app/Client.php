<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
   protected $table = 'clients'; 

   protected $fillable = [
   	'companyName',
   	'email',
   	];

   protected $hidden = ['password'];
}
