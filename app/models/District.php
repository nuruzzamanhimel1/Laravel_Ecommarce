<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function division()
    {	
    	// one district has one division that is inverse relationship
        return $this->belongsTo(Division::class,'division_id','id');
    }
}
