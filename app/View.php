<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class View extends Model
{
    use Notifiable;
    

    protected $table = 'views';

    protected $fillable = [
        'app_id', 'device_id', 'ad_id','access_count',
    ];
    
    protected $hidden = [
        
    ];
}
