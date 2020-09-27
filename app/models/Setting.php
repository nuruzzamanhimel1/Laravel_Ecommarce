<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	// Here this method is used for JUST practicing get setting values just it
    
    public static function select_setting()
    {
    	$setting = Setting::orderBy('id','asc')->first();
    	return $setting;
    }
}
