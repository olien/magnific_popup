<?php
// init addon
$REX['ADDON']['name']['magnific_popup'] = 'Magnific Popup';
$REX['ADDON']['page']['magnific_popup'] = 'magnific_popup';
$REX['ADDON']['version']['magnific_popup'] = '1.3.0';
$REX['ADDON']['author']['magnific_popup'] = 'RexDude';
$REX['ADDON']['supportpage']['magnific_popup'] = 'forum.redaxo.de';
$REX['ADDON']['perm']['magnific_popup'] = 'magnific_popup[]';

// permissions
$REX['PERM'][] = 'magnific_popup[]';

// add lang file
if ($REX['REDAXO']) {
	$I18N->appendFile($REX['INCLUDE_PATH'] . '/addons/magnific_popup/lang/');
}

// includes
require($REX['INCLUDE_PATH'] . '/addons/magnific_popup/classes/class.rex_magnific_popup_utils.inc.php');

// default settings (user settings are saved in data dir!)
$REX['ADDON']['magnific_popup']['settings'] = array(
	'include_jquery' => true
);

// overwrite default settings with user settings
rex_magnific_popup_utils::includeSettingsFile();

if ($REX['REDAXO']) {
	// add subpages
	$REX['ADDON']['magnific_popup']['SUBPAGES'] = array(
		array('', $I18N->msg('magnific_popup_start')),
		array('image_module', $I18N->msg('magnific_popup_image_module')),
		array('gallery_module', $I18N->msg('magnific_popup_gallery_module')),
		array('settings', $I18N->msg('magnific_popup_settings')),
		array('help', $I18N->msg('magnific_popup_help'))
	);
} else {
	rex_register_extension('OUTPUT_FILTER', 'rex_magnific_popup_utils::includeMagnificPopup');
}
?>
