<?php

$page = rex_request('page', 'string');
$subpage = rex_request('subpage', 'string');
$func = rex_request('func', 'string');

// save settings
if ($func == 'update') {
	$settings = (array) rex_post('settings', 'array', array());

	rex_magnific_popup_utils::replaceSettings($settings);
	rex_magnific_popup_utils::updateSettingsFile();
}

// retrieve links to imagetypes
$sql = new rex_sql();
//$sql->debugsql = true;
$sql->setQuery("SELECT id FROM `" . $REX['TABLE_PREFIX'] . "679_types` WHERE name LIKE 'magnific_popup_image_thumb'");

if ($sql->getRows() == 1) {
	$imageManagerLinkImage = 'index.php?page=image_manager&subpage=effects&type_id=' . $sql->getValue('id');
} else {
	$imageManagerLinkImage = 'index.php?page=image_manager&subpage=types';
}

$sql->setQuery("SELECT id FROM `" . $REX['TABLE_PREFIX'] . "679_types` WHERE name LIKE 'magnific_popup_gallery_thumb'");

if ($sql->getRows() == 1) {
	$imageManagerLinkGallery = 'index.php?page=image_manager&subpage=effects&type_id=' . $sql->getValue('id');
} else {
	$imageManagerLinkGallery = 'index.php?page=image_manager&subpage=types';
}

?>

<div class="rex-addon-output">
	<div class="rex-form">

		<h2 class="rex-hl2"><?php echo $I18N->msg('magnific_popup_settings'); ?></h2>

		<form action="index.php" method="post">

			<fieldset class="rex-form-col-1">
				<div class="rex-form-wrapper">
					<input type="hidden" name="page" value="<?php echo $page; ?>" />
					<input type="hidden" name="subpage" value="<?php echo $subpage; ?>" />
					<input type="hidden" name="func" value="update" />

					<div class="rex-form-row rex-form-element-v1">
						<p class="rex-form-text">
							<label for="include_jquery"><?php echo $I18N->msg('magnific_popup_settings_include_jquery'); ?></label>
							<input type="hidden" name="settings[include_jquery]" value="0" />
							<input type="checkbox" name="settings[include_jquery]" id="include_jquery" value="1" <?php if ($REX['ADDON']['magnific_popup']['settings']['include_jquery']) { echo 'checked="checked"'; } ?>>
						</p>
					</div>

					<div class="rex-form-row rex-form-element-v1">
						<p class="rex-form-col-a rex-form-read">
							<label for="imagetype_image"><?php echo $I18N->msg('magnific_popup_settings_imagetype_image'); ?></label>
							<span class="rex-form-read" id="imagetype_image"><a href="<?php echo $imageManagerLinkImage; ?>">magnific_popup_image_thumb</a></span>
						</p>
					</div>

					<div class="rex-form-row rex-form-element-v1">
						<p class="rex-form-col-a rex-form-read">
							<label for="imagetype_gallery"><?php echo $I18N->msg('magnific_popup_settings_imagetype_gallery'); ?></label>
							<span class="rex-form-read" id="imagetype_gallery"><a href="<?php echo $imageManagerLinkGallery; ?>">magnific_popup_gallery_thumb</a></span>
						</p>
					</div>

					<div class="rex-form-row rex-form-element-v1">
						<p class="rex-form-col-a rex-form-read">
							<label for="css_hint"><?php echo $I18N->msg('magnific_popup_settings_custom_css'); ?></label>
							<span class="rex-form-read" id="css_hint"><code>/files/addons/magnific_popup/custom.css</code></span>
						</p>
					</div>

					<div class="rex-form-row rex-form-element-v1">
						<p class="rex-form-submit">
							<input type="submit" class="rex-form-submit" name="sendit" value="<?php echo $I18N->msg('magnific_popup_settings_save'); ?>" />
						</p>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>



