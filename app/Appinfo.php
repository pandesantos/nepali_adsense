<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Appinfo extends Model
{
    use Notifiable;
    

    protected $table = 'appinfos';

    protected $fillable = [
        'appId', 'cCount', 'vCount',
    ];
    
    protected $hidden = [
        
    ];
}
