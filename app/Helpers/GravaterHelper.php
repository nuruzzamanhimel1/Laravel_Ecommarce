<?php
namespace App\Helpers;

/**
 * GravaterHelper class
 */
class GravaterHelper 
{
	
	public static function validate_gravater($email)	
	{
		$hash = md5($email);
		$url = 'http://gravatar.com/avatar/'.$hash.'?d=404';
		$headers = @get_headers($url);
		if(!preg_match("|200|", $headers[0]))
		{
			$has_valid_avatar = false;
		}
		else{
			$has_valid_avatar = true;
		}
		return $has_valid_avatar;

	}
/**
 * Get Gravater Image From Email address
 */
	public static function gravatar_image($email,$size = 0,$d = "")
	{
		$hash = md5($email);
		$image_url = 'http://gravatar.com/avatar/'.$hash.'?s='.$size.'&d='.$d;
		return $image_url;
	}







}