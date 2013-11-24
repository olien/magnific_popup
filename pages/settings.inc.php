<?php

$configFile = $REX['INCLUDE_PATH'] . '/addons/magnific_popup/settings.inc.php';

if (rex_request('func', 'string') == 'update') {
	$include_jquery = trim(rex_request('include_jquery', 'string'));

	$REX['ADDON']['magnific_popup']['settings']['include_jquery'] = $include_jquery;

	$content = '
		$REX[\'ADDON\'][\'magnific_popup\'][\'settings\'][\'include_jquery\'] = "' . $include_jquery . '";
	';

	if (rex_replace_dynamic_contents($configFile, str_replace("\t", "", $content)) !== false) {
		echo rex_info($I18N->msg('magnific_popup_configfile_update'));
	} else {
		echo rex_warning($I18N->msg('magnific_popup_configfile_nosave'));
	}
}

if (!is_writable($configFile)) {
	echo rex_warning($I18N->msg('magnific_popup_configfile_nowrite', $configFile));
}
?>

<div class="rex-addon-output">
	<div class="rex-form">

		<h2 class="rex-hl2"><?php echo $I18N->msg('magnific_popup_settings'); ?></h2>

		<form action="index.php" method="post">

			<fieldset class="rex-form-col-1">
				<div class="rex-form-wrapper">
					<input type="hidden" name="page" value="magnific_popup" />
					<input type="hidden" name="subpage" value="settings" />
					<input type="hidden" name="func" value="update" />

					<div class="rex-form-row rex-form-element-v1">
						<p class="rex-form-text">
							<label for="include_jquery"><?php echo $I18N->msg('magnific_popup_settings_include_jquery'); ?></label>
							<input type="checkbox" name="include_jquery" id="include_jquery" value="1" <?php if ($REX['ADDON']['magnific_popup']['settings']['include_jquery'] == 1) { echo 'checked="checked"'; } ?>>
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



