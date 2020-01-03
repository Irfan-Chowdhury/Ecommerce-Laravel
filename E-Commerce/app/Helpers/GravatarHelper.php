<?php
namespace App\Helpers;
/**
* GravatarHelper
*/
class GravatarHelper
{
	/**
	* validate_gravater
	*
	* Check if the email is exist in any gravet with image
	*/
	public static function validate_gravatar($email)
	{
		$hash = md5($email);
		$uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=80';
		$headers = @get_headers($uri);
		if ( !preg_match("|200|", $headers[0]) ){
			$has_valid_avater = FALSE;
		}
		else{
			$has_valid_avater = TRUE;
		}
		return $has_valid_avater;
	}  
	/**
	* Gravater Image
	*/
	public static function gravatar_image($email, $size=0, $d="")
	{
		$hash = md5($email);
		$image_uri = 'http://www.gravatar.com/avatar/' . $hash . '?s=' . $size . '&d='. $d ;
		return $image_uri;
    }
}

































//namespace App\Helpers;

/*
* Gravater Helper
*/ 

/*class GravaterHelper
{
    /*
    *validate_gravater
    *
    *Check if the email is exists in any gravet with image
    */
    /*public static function validate_gravater($email)
    {
        $hash = md5($email);
        //http://www.gravatar.com/avatar/0bb96ee2c951568c8ba1068959dcc808?s=80
        $uri  = 'https://www.gravatar.com/avater/'. $hash . '?d=80'; //0bb96ee2c951568c8ba1068959dcc808= my email hash ; ?d=80 = size
        $header = @get_headers($uri); //uri = url
        if ( !preg_match("|200|",$header[0])) 
        {
            $has_valid_avater = FALSE;
        }
        else 
        {
            $has_valid_avater = TRUE ;
        }

        return $has_valid_avater;
    }

    public static function gravater_image($email, $size=0, $d="")
    {
        $hash = md5($email);
        $image_uri = 'https://www.gravatar.com/avater/' .$hash . '?s=' .$size .'&d='.$d;
        return $image_uri;
    }*/
//}

?>