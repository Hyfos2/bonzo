<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Position;
use App\Grade;
use App\Department;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'name', 'email', 'password','surname','departmentId','positionId','gradeId','userName'
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
    public function leaveDay()
    {
            return $this->hasMany(LeaveDay::class);
    }
     public function department()
    {
            return $this->belongsTo(Department::class,'departmentId','id');
    }
}
