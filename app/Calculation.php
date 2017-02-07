<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Calculation extends Model
{
    use Notifiable;
    

    protected $table = 'calculations';

    protected $fillable = [
        'deviceId', 'adId',
    ];
    
    protected $hidden = [
        
    ];
}
