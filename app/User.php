<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'name', 'email', 'password','surname','positionId','gradeId','userName'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function accessLevel()
    {

        if($this->positionId == 1)
        {
            return true;
        }
        return false;
    }

    public function position()
    {
        return $this->belongsTo(Position::class,'positionId','id');
    }
}
