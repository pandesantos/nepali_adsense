<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Adinfo extends Model
{
    use Notifiable;
    

    protected $table = 'adinfos';

    protected $fillable = [
        'adId', 'cCount', 'vCount',
    ];
    
    protected $hidden = [
        
    ];
}
