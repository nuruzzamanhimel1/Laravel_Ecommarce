<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	// one to many
	 public function product_images()
    {
        return $this->hasMany('App\models\ProductImage');
        // return $this->hasMany(ProductImage::class);
    }
    //

    public function category()
    {
        // one to one but Inverse relationship
    	return $this->belongsTo('App\models\Category','category_id','id');
    }

    public function barnd()
    {
        // one to one but Inverse relationship
    	return $this->belongsTo('App\models\Brand','brand_id','id');
    }








}
