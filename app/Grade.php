<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected  $fillable =['name','number','grade','salary'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function staff()
    {
        return $this->hasMany(Staff::class);
    }
}
