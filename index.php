<?php

	function thumbnail ($src, $size) {

		$type = exif_imagetype($src);

		switch ($type) {
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
				return false;
				break;
		}
		
		list($width, $height) = getimagesize($src);

		$thumb_width = 50;
		$thumb_height = 50;

		$thumb = imagecreatetruecolor($thumb_width, $thumb_height);

		imagecopyresampled($thumb, $image, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);

		return $thumb;
	}

?>
