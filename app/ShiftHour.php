<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShiftHour extends Model
{

 		protected $fillable =[
 			'name','timeIn','timeOut','workingHours','created_by'
 		];

    public function workingStaff()
    {
        return $this->hasMany(WorkingStaff::class);
    }
}
