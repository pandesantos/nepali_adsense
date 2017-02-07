<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Clientinfo extends Model
{
    use Notifiable;
    

    protected $table = 'clientinfos';

    protected $fillable = [
        'cId', 'image','category','link','vCount','cCount',
    ];
    
    protected $hidden = [
        
    ];
}
