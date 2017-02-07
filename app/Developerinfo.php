<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Developerinfo extends Model
{
    use Notifiable;
    

    protected $table = 'developerinfos';

    protected $fillable = [
        'dId', 'appId', 'category',
    ];
    
    protected $hidden = [
        
    ];
}
