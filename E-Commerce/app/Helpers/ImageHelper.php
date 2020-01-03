<?php 
namespace App\Helpers;
/**
* ImageHelper Class
*/
use App\Models\User;
use App\Helpers\GravatarHelper;

class ImageHelper
{
	public static function getUserImage($id)
	{
		$user = User::find($id);
		$avater_url = "";
		if ( !is_null($user) )
		{
			if ( $user->avater == null ){
				// Return user the Gravater Image
				if ( GravatarHelper::validate_gravatar($user->email) ){
					$avater_url = GravatarHelper::gravatar_image($user->email, 35);
				}
				else{
					// If no Gravater Found
					$avater_url = url('image/users/gravater.jpg');
				}
			}
			else{
				// Return the Image if the Profile is updated by the user
				$avater_url = url('image/users/' . $user->avater);
			}
		}
		else{
			//return redirect('/');
		}
		return $avater_url;
	}
}



























//namespace App\Helpers;

// ImageHelper Class

/*use App\Helpers\GravaterHelper;
use App\Models\User;

class ImageHelper
{
    public static function getUserImage($id)
    {
        $user = User::find($id);
        $avater_url = "";

        if (!is_null($user)) 
        {
            if ($user->avater == null) 
            {
                # Return user the Gravater Image
                if (GravaterHelper::validate_gravater($user->email)) 
                {
                    $avater_url = GravaterHelper::gravater_image($user->email,30);
                }
                else 
                {
                    // If no Gravater Found
                    $avater_url = url('image/users/gravater.jpg');
                }
            }
            else 
            {
                // Return the Image if the Profile is updated by the user
                $avater_url = url('image/users/'.$user->avater);
            }
        }
        else 
        {
            //return redirect('/');
        }

        return $avater_url;
    }
}*/

?>