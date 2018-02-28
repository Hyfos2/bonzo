<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveDay extends Model
{
	protected $guarded =[];
	
    public function staff()
    {
        return $this->belongsTo(Staff::class,'staffId','id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class,'created_by','id');
    }
    public function status()
    {
        return $this->belongsTo(LeaveRequestStatus::class,'pending','id');
    }
}
