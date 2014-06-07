<?php
  /*
   *  create image on the air
   *  hide your images source
   *  create thumb on air
   */
	public function better_displayImg($url){
			
		//$url = $_GET['eurl']; 
				
		$allowed = array('jpg','gif','png'); 
		$pos = strrpos($url, "."); 
		$str = substr($url,($pos + 1)); 
		
		$ch = curl_init(); 
		$timeout = 0; 
		curl_setopt ($ch, CURLOPT_URL, $url); 
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout); 
		
		// Getting binary data 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1); 
		
		$image = curl_exec($ch); 
		curl_close($ch); 
		
		
		
		// output to browser 
		$im = @imagecreatefromstring($image); 
		
		$tw = @imagesx($im);
		
		if(!$im){ 
		    die('Error in imagettftext function'); 
		}else{ 
		    if($str == 'jpg' || $str == 'jpeg') 
		        header("Content-type: image/jpeg"); 
		    if($str == 'gif') 
		        header("Content-type: image/gif"); 
		    if($str == 'png') 
		        header("Content-type: image/png"); 
		    $th = imagesy($im);  
		    $thumbWidth = $tw; 
		    $thumbHeight = $th; 
		    $thumbImg = imagecreatetruecolor($thumbWidth, $thumbHeight); 
		    if($str == 'gif'){ 
		        $colorTransparent = imagecolortransparent($im); 
		        imagefill($thumbImg, 0, 0, $colorTransparent); 
		        imagecolortransparent($thumbImg, $colorTransparent); 
		    } 
		    if($str == 'png'){ 
		        imagealphablending($thumbImg, false); 
		        imagesavealpha($thumbImg,true); 
		        $transparent = imagecolorallocatealpha($thumbImg, 255, 255, 255, 127); 
		        imagefilledrectangle($thumbImg, 0, 0, $thumbWidth, $thumbHeight, $transparent); 
		    } 
		    imagecopyresampled($thumbImg, $im, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $tw, $th); 
		
		
		    if($str == 'jpg' || $str == 'jpeg'){ 
		        imagejpeg($thumbImg, NULL, 100); 
		    } 
		    if($str == 'gif'){ 
		        imagegif($thumbImg); 
		    } 
		    if($str == 'png'){ 
		        imagealphablending($thumbImg,TRUE); 
		        imagepng($thumbImg, NULL, 9, PNG_ALL_FILTERS); 
		    } 
		         
		    imagedestroy($thumbImg); 
		} 
		die();	
	}
