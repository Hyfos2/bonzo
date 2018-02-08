<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{

	protected $fillable  =[
		'name'
	];
    
    public function user()
        {
            return $this->hasMany(User::class);
            }
    public function staff()
        {
            return $this->hasMany(Staff::class);
        }
}
