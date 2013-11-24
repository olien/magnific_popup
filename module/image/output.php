<?php
$imageType = 'magnific_popup_image_thumb';
$imageFile = 'REX_FILE[1]';

if ($imageFile != '') {
	$media = OOMedia::getMediaByFilename($imageFile);

	// get title and description
	if (OOMedia::isValid($media)) {
		$title = $media->getValue('title');
		$description = $media->getValue('med_description');
	} else {
		$title = '';
		$description = '';
	}

	// get media dir
	if (isset($REX['MEDIA_DIR'])) {
		$mediaDir = $REX['MEDIA_DIR'];
	} else {
		$mediaDir =  'files';
	}

	// generate image url
	$imageUrl = $REX['HTDOCS_PATH'] . $mediaDir . '/' . $imageFile;

	// generate image manager url
	if (class_exists('seo42')) {
		$imageManagerUrl = seo42::getImageManagerUrl($imageFile, $imageType);
	} else {
		$imageManagerUrl = $REX['HTDOCS_PATH'] . 'index.php?rex_img_type=' . $imageType . '&amp;rex_img_file=' . $imageFile;
	}

	// get dimensions of image manager image
	$resizedFile = $REX['INCLUDE_PATH'] . '/generated/files/image_manager__' . $imageType . '_' . $imageFile;
	$imageSize = @getimagesize($resizedFile);

	if ($imageSize != false) {
		$imageDimensions = ' width="' . $imageSize[0] . '" height="' . $imageSize[1] . '"';
	} else {
		$imageDimensions = '';
	}

	// finally print html code
	echo '<a class="magnific-popup-image" href="' . $imageUrl . '" title="' . $description . '">';
	echo '<img src="' . $imageManagerUrl . '"' . $imageDimensions . ' alt="' . $title . '" />';
	echo '</a>';
}
?>
