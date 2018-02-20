<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingStaff extends Model
{
   protected $guarded  =[];

   public function staff()
   {
       return $this->belongsTo(Staff::class,'staffname','id');
   }

    public function hour()
    {
        return $this->belongsTo(ShiftHour::class,'shiftHours','id');
    }
}
