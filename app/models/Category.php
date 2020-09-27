<?php

//Updatd namespace
namespace App\models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
	{
		// one to one but reverse
	    return $this->belongsTo('App\models\Category', 'parent_id');
	}

	 public function products()
	{
		// one to many products but reverse
	    return $this->hasMany('App\models\Product', 'category_id','id');
	}

	// function call in laravel

	public static function showSubParentOnCategories($id,$parent_id)
	{
		$category = Category::where('id',$id)
					->where('parent_id',$parent_id)
					->get();
		if($category->count() > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}






}
