<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequestStatus extends Model
{
    public function leave()

    {
    	return $this->hasMany(Leave::class);
    }
}
