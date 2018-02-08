<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentType extends Model
{
     protected $fillable =['name'];

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }
}
