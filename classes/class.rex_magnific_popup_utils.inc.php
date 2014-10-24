<?php
class rex_magnific_popup_utils {
	public static function includeMagnificPopup($params) {
		global $REX;

		$insert = PHP_EOL;
		$insert .= "\t" . '<!-- BEGIN AddOn Magnific Popup -->' . PHP_EOL;
		$insert .= "\t" . '<link rel="stylesheet" type="text/css" href="' . $REX['HTDOCS_PATH'] . 'files/addons/magnific_popup/magnific-popup.css" media="screen" />' . PHP_EOL;
		$insert .= "\t" . '<link rel="stylesheet" type="text/css" href="' . $REX['HTDOCS_PATH'] . 'files/addons/magnific_popup/custom.css" media="screen" />' . PHP_EOL;
	
		if ($REX['ADDON']['magnific_popup']['settings']['include_jquery']) {
			$insert .= "\t" . '<script type="text/javascript" src="' . $REX['HTDOCS_PATH'] . 'files/addons/magnific_popup/jquery.min.js"></script>' . PHP_EOL;			
		}

		$insert .= "\t" . '<script type="text/javascript" src="' . $REX['HTDOCS_PATH'] . 'files/addons/magnific_popup/jquery.magnific-popup.min.js"></script>' . PHP_EOL;
		$insert .= "\t" . '<script type="text/javascript" src="' . $REX['HTDOCS_PATH'] . 'files/addons/magnific_popup/init.js"></script>' . PHP_EOL;
		$insert .= "\t" . '<!-- END AddOn Magnific Popup -->' . PHP_EOL;
		
		return str_replace('</head>', $insert . '</head>', $params['subject']);
	}

	public static function getHtmlFromMDFile($mdFile, $search = array(), $replace = array()) {
		global $REX;

		$curLocale = strtolower($REX['LANG']);

		if ($curLocale == 'de_de') {
			$file = $REX['INCLUDE_PATH'] . '/addons/magnific_popup/' . $mdFile;
		} else {
			$file = $REX['INCLUDE_PATH'] . '/addons/magnific_popup/lang/' . $curLocale . '/' . $mdFile;
		}

		if (file_exists($file)) {
			$md = file_get_contents($file);
			$md = str_replace($search, $replace, $md);
			$md = self::makeHeadlinePretty($md);

			return Parsedown::instance()->parse($md);
		} else {
			return '[translate:' . $file . ']';
		}
	}

	public static function makeHeadlinePretty($md) {
		return str_replace('Magnific Popup AddOn - ', '', $md);
	}

	public static function getSettingsFile() {
		global $REX;

		$dataDir = $REX['INCLUDE_PATH'] . '/data/addons/magnific_popup/';

		return $dataDir . 'settings.inc.php';
	}

	public static function includeSettingsFile() {
		global $REX; // important for include

		$settingsFile = self::getSettingsFile();

		if (!file_exists($settingsFile)) {
			self::updateSettingsFile(false);
		}

		require_once($settingsFile);
	}

	public static function updateSettingsFile($showSuccessMsg = true) {
		global $REX, $I18N;

		$settingsFile = self::getSettingsFile();
		$msg = self::checkDirForFile($settingsFile);

		if ($msg != '') {
			if ($REX['REDAXO']) {
				echo rex_warning($msg);			
			}
		} else {
			if (!file_exists($settingsFile)) {
				self::createDynFile($settingsFile);
			}

			$content = "<?php\n\n";
		
			foreach ((array) $REX['ADDON']['magnific_popup']['settings'] as $key => $value) {
				$content .= "\$REX['ADDON']['magnific_popup']['settings']['$key'] = " . var_export($value, true) . ";\n";
			}

			if (rex_put_file_contents($settingsFile, $content)) {
				if ($REX['REDAXO'] && $showSuccessMsg) {
					echo rex_info($I18N->msg('magnific_popup_config_ok'));
				}
			} else {
				if ($REX['REDAXO']) {
					echo rex_warning($I18N->msg('magnific_popup_config_error'));
				}
			}
		}
	}

	public static function replaceSettings($settings) {
		global $REX;

		// type conversion
		foreach ($REX['ADDON']['magnific_popup']['settings'] as $key => $value) {
			if (isset($settings[$key])) {
				$settings[$key] = self::convertVarType($value, $settings[$key]);
			}
		}

		$REX['ADDON']['magnific_popup']['settings'] = array_merge((array) $REX['ADDON']['magnific_popup']['settings'], $settings);
	}

	public static function createDynFile($file) {
		$fileHandle = fopen($file, 'w');

		fwrite($fileHandle, "<?php\r\n");
		fwrite($fileHandle, "// --- DYN\r\n");
		fwrite($fileHandle, "// --- /DYN\r\n");

		fclose($fileHandle);
	}

	public static function checkDir($dir) {
		global $REX, $I18N;

		$path = $dir;

		if (!@is_dir($path)) {
			@mkdir($path, $REX['DIRPERM'], true);
		}

		if (!@is_dir($path)) {
			if ($REX['REDAXO']) {
				return $I18N->msg('magnific_popup_install_make_dir', $dir);
			}
		} elseif (!@is_writable($path . '/.')) {
			if ($REX['REDAXO']) {
				return $I18N->msg('magnific_popup_install_perm_dir', $dir);
			}
		}
		
		return '';
	}

	public static function checkDirForFile($fileWithPath) {
		$pathInfo = pathinfo($fileWithPath);

		return self::checkDir($pathInfo['dirname']);
	}

	public static function convertVarType($originalValue, $newValue) {
		$arrayDelimiter = ',';

		switch (gettype($originalValue)) {
			case 'string':
				return trim($newValue);
				break;
			case 'integer':
				return intval($newValue);
				break;
			case 'boolean':
				return (bool) $newValue;
				break;
			case 'array':
				if ($newValue == '') {
					return array();
				} else {
					return explode($arrayDelimiter, $newValue);
				}
				break;
			default:
				return $newValue;
				
		}
	}
}

