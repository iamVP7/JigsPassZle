<?php
/*<------------------------------------
	
	FILE 	= JPEGSlicer.php
	TYPE	= PHP CLASS
	AUTHOR	= ANISH KARIM C, <thecoderin@aol.in>
	DATE	= 20 Jan 2008
	
	DESCRIPTION : JPEGSlicer is a JPEG image resizer-Slicer class written in pure php.
	Whcich is used to resize and slice the entire image into 9 sub parts and this will be help to load the imge faster in the post upload section.
-------------------------------------->*/


class JPEGSlicer
{
	function JPEGSlicer($directory, $temp_image,$selection,$resize) 
	{
		
		
		$this->image_info		=	getimagesize($temp_image);
		if(strtolower($selection) == 'nill') //NO RESIZE NEEDED
		{
			$height	=	$this->image_info[1];
	 		$width	=	$this->image_info[0];
		}
		else if(strtolower($selection) == 'height') // IF THE FIXED SIZE IS HEIGHT
		{
			$height 	= 	$resize;
			$ratio		=	$height/$this->image_info[1];
			$width		=	ceil($this->image_info[0] * $ratio);
			
		}
		else if(strtolower($selection) == 'width')
		{
			$width	=	$resize;
			$ratio	=	$width/$this->image_info[0];
			$height	=	ceil($this->image_info[1] * $ratio);
		}
		@mkdir($directory,0777);
		@mkdir($directory.'/1',0777);
		@mkdir($directory.'/2',0777);
		@mkdir($directory.'/3',0777);
		@mkdir($directory.'/4',0777);
		@mkdir($directory.'/5',0777);
		@mkdir($directory.'/6',0777);
		@mkdir($directory.'/7',0777);
		@mkdir($directory.'/8',0777);
		@mkdir($directory.'/9',0777);
		
		$path[0]	=	$directory.'/1/';
		$path[1]	=	$directory.'/2/';
		$path[2]	=	$directory.'/3/';
		$path[3]	=	$directory.'/4/';
		$path[4]	=	$directory.'/5/';
		$path[5]	=	$directory.'/6/';
		$path[6]	=	$directory.'/7/';
		$path[7]	=	$directory.'/8/';
		$path[8]	=	$directory.'/9/';
		
		$this->Slicer($path,$height,$width,$temp_image);
	}

	function Slicer($path,$height,$width,$tmp_img)
	{
		$this->filename		=	array();
		$full_width			=	$this->image_info[0];
		$full_height		=	$this->image_info[1];
		echo"<br>".$width." ".$height;
		$split_width		=	round($width/3);
		$split_height		=	round($height/3);
		
		for($i=0;$i<9;$i++)
		{
			
			$new_img		=	imagecreatetruecolor($width,$height);
			$original		=	imagecreatefromjpeg($tmp_img);
			imagecopyresized($new_img,$original,0,0,0,0,$width,$height,$full_width,$full_height)or die('Cannot Resize Image');
			
			if(($i+1)%4	== 0 && $i <6)
				{
					$init_x	=	0;
					$init_y	=	$split_height;
						
				}
			if( $i ==6)
			$init_x	=	0;
			if( $i >=6)
			 $init_y	=	$split_height+$split_height;


		$this->filename[$i]	=	$path[$i].time().'.jpg';
		$cut_image	=	imagecreatetruecolor($split_width,$split_height);
					
		imagecopyresampled($cut_image,$new_img,0,0,$init_x,$init_y,$split_width,$split_height,$split_width,$split_height)or die('Cannot Resample');



			
				imagejpeg($cut_image,$this->filename[$i])or die('Cannot Write Image');
				imagedestroy($new_img);
				imagedestroy($cut_image);
				$init_x	=	$init_x+ $split_width;
				
			
		
		}

	}
}
?>
