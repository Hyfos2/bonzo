<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Staff;
use App\User;
use App\timeSheetFile;
class Department extends Model
{

    protected $guarded  = [];

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function timeSheet()
    {
    	return $this->hasOne(timeSheet::class);
    }
    public function timeSheetfile()
    {
        return $this->hasOne(timeSheetFile::class);
    }

    public function category()
    {
        return $this->hasMany(category::class);
    }
}
