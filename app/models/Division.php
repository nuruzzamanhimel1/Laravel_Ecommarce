<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
     public function districts()
    {
    	// one division has many districts
        return $this->hasMany(District::class);
    }
}
