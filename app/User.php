<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Position;
use App\Grade;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','surname','positionId','gradeId','userName'
    ];

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

    public function grade()
    {
        return $this->belongsTo(Grade::class,'gradeId','id');
    }
}
