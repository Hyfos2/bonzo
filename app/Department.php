<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Staff;
use App\User;

class Department extends Model
{

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

    public function user()
    {
    	return $this->hasMany(User::class);
    }
}
