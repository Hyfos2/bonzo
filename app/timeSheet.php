<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Staff;

class timeSheet extends Model
{
 public function staff()
    {
    	return $this->belongsTo(Staff::class,'staffName','id');

    }

    public function department(){
    	return $this->belongsTo(Department::class,'jobNumber','id');
    }   
}
