<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveDay extends Model
{
    public function staff()
    {
        return $this->belongsTo(Staff::class,'staffId','id');
    }
}
