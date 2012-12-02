<?php

	public static function thumbnail ($image_name, $size) {

		$image_path = OC_Filesystem::getLocalFile($image_name);
			
			if (!file_exists($image_path)) {
				return null;
			}

		$image = new OC_Image($image_path);

		/*switch ($type) {
			case 'IMAGETYPE_GIF':
				$image = imagecreatefromgif($src);
				break;

			case 'IMAGETYPE_JPEG':
				$image = imagecreatefromjpeg($src);
				break;
			
			case 'IMAGETYPE_PNG':
				$image = imagecreatefrompng($src);
				break;

			case 'IMAGETYPE_BMP':
				$image = imagecreatefromwbmp($src);
				break;

			default:
				return "Filetype not found.";
				break;
		}
		*/
		switch ($size) {
			case 'xs':
				$thumb_width = 32;
				$thumb_height = 32;
				break;

			case 's':
				$thumb_width = 64;
				$thumb_height = 64;
				break;
			
			case 'm':
				$thumb_width = 128;
				$thumb_height = 128;
				break;

			case 'l':
				$thumb_width = 640;
				$thumb_height = 480;
				break;
				
			case 'xl':
				$thumb_width = 1024;
				$thumb_height = 678;
				break;

			default:
				return null;
				break;
		}
		
		$width = $image->width();
		$height = $image->height();

		$thumb = $image->crop(0, 0, $thumb_width, $thumb_height);
		
		return $thumb;
	}

?>
