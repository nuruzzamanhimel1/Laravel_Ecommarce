<?php
namespace App\Helpers;
/**
 * 
 */
use App\models\User; 
use App\Helpers\GravaterHelper;

class ImageHelper
{
	
	public static function getUserImage($id)
	{
		$user = User::find($id);
		$avater_url = "";

		if(!is_null($user))
		{
			if($user->avator == NULL)
			{
				// return Gravater Image
				if(GravaterHelper::validate_gravater($user->email))
				{
					// have Gravater Image
					$avater_url = GravaterHelper::gravatar_image($user->email,100);
				}
				else{
					// when have not gravater Image
					$avater_url = url('images/default/user.png');
				}
			}
			else{
				//return DB image
				$avater_url = url('images/users/'.$user->avator);
			}

		}
		else{
			return redirect('/');
		}

		return $avater_url;
	}
	
}