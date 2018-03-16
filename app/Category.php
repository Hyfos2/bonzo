<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Staff;

class Category extends Model
{

    protected $guarded =[];
    public function staff()
    {
    	return $this->hasMany(Staff::class);
    }
    public function user()
    {
    	return $this->hasMany(User::class);
    }
    public function department()
    {
    	return $this->belongsTo(Department::class,'departmentId','id');
    }
}
