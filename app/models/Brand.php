<?php

namespace App\models;


use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
     public function products()
	{
		// one to many products but reverse
	    return $this->hasMany('App\models\Product', 'brand_id','id');
	}
}
