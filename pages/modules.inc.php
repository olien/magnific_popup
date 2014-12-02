<?php

$mypage = rex_request('page','string');
$subpage = rex_request('subpage', 'string');
$chapter = rex_request('chapter', 'string');
$func = rex_request('func', 'string');

// chapters
$chapterpages = array (
	'' => array($I18N->msg('magnific_popup_modules_image_module'), 'pages/modules/image_module.inc.php'),
	'gallery_module' => array($I18N->msg('magnific_popup_modules_gallery_module'), 'pages/modules/gallery_module.inc.php')
);

// build chapter navigation
$chapternav = '';

foreach ($chapterpages as $chapterparam => $chapterprops) {
	if ($chapterprops[0] != '') {
		if ($chapter != $chapterparam) {
			$chapternav .= ' | <a href="?page=' . $mypage . '&amp;subpage=' . $subpage . '&amp;chapter=' . $chapterparam . '">' . $chapterprops[0] . '</a>';
		} else {
			$chapternav .= ' | <a class="rex-active" href="?page=' . $mypage . '&amp;subpage=' . $subpage . '&amp;chapter=' . $chapterparam . '">' . $chapterprops[0] . '</a>';
		}
	}
}
$chapternav = ltrim($chapternav, " | ");

// build chapter output
$addonroot = $REX['INCLUDE_PATH']. '/addons/'.$mypage.'/';
$source    = $chapterpages[$chapter][1];

// output
echo '
<div class="rex-addon-output" id="subpage-' . $subpage . '">
  <h2 class="rex-hl2" style="font-size:1em">' . $chapternav . '</h2>
  <div class="rex-addon-content">
    <div class= "addon-template">
    ';

include($addonroot . $source);

echo '
    </div>
  </div>
</div>';

?>
