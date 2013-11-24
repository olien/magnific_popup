<?php
$imageType = rex_get_file_contents($REX["INCLUDE_PATH"] . "/addons/magnific_popup/module/image/imgtype.txt");
$moduleInput = rex_get_file_contents($REX["INCLUDE_PATH"] . "/addons/magnific_popup/module/image/input.php");
$moduleOutput = rex_get_file_contents($REX["INCLUDE_PATH"] . "/addons/magnific_popup/module/image/output.php");
$style = rex_get_file_contents($REX["INCLUDE_PATH"] . "/addons/magnific_popup/module/image/style.css");
?>

<div class="rex-addon-output">
	<h2 class="rex-hl2"><?php echo $I18N->msg('magnific_popup_module_requirements'); ?></h2>
	<div class="rex-area-content module">
		<p class="headline"><?php echo $I18N->msg('magnific_popup_module_imagetype'); ?></p><p class="rex-code" style="color: #000;"><code><?php echo trim($imageType); ?></code></p>
		<p>&nbsp;</p>
		<p class="headline"><?php echo $I18N->msg('magnific_popup_module_style'); ?></p><?php rex_highlight_string($style); ?>
	</div>
</div>

<div class="rex-addon-output">
	<h2 class="rex-hl2"><?php echo $I18N->msg('magnific_popup_image_module'); ?></h2>
	<div class="rex-area-content module">
		<p class="headline"><?php echo $I18N->msg('magnific_popup_module_input'); ?></p><?php rex_highlight_string($moduleInput); ?>
		<p>&nbsp;</p>
		<p class="headline"><?php echo $I18N->msg('magnific_popup_module_output'); ?></p><?php rex_highlight_string($moduleOutput); ?>
	</div>
</div>


