<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $guarded =[];
    public function department()
       {
           return $this->belongsTo(Department::class,'departmentId','id');
       }
    public function grade()
        {
            return $this->belongsTo(Grade::class,'gradeId','id');
        }
    public function position()
        {
            return $this->belongsTo(Position::class,'positionId','id');
        }

    public function employment()
        {
            return $this->belongsTo(EmploymentType::class,'employmentTypeId','id');
        }
    public function leaveDay()
    {
        return $this->hasMany(LeaveDay::class);
    }
    public function workingStaff()
    {
        return $this->hasMany(WorkingStaff::class);
    }

}
