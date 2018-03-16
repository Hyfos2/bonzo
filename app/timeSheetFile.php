<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class timeSheetFile extends Model
{
	protected $guarded = [];
    public function staff()
    {
    	return $this->belongsTo(Staff::class,'staffName','id');

    }

    public function department(){

    	return $this->belongsTo(Department::class,'department','id');
    }
}
