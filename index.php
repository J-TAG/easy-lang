<?php


// include EasyLang Class
require_once('easylang.php');

/**
 *
 * Easy Lang demo class.
 * This example will showing how to use EasyLang PHP class to translate your page to multiple languages.
 *
 * @author Hesam Gholami <hesamgholami@yahoo.com>
 */
class Demo
{

	/**
	 *
	 * This constructor will parse URL to find language that should be used.
	 *
	 */
	function __construct()
	{
		$route = substr($_SERVER['REQUEST_URI'], strlen($_SERVER['SCRIPT_NAME']));
		$part = explode("/", $route);

		$language_short_name = 'en';

		if (isset($part[1])) {
			switch ($part[1]) {
				case 'fa':
					$language_short_name = 'fa';
					break;

				case 'de':
					$language_short_name = 'de';
					break;

				default:
					// If can't find language, use English by default
					$language_short_name = 'en';
			}
		}

		// Start EasyLang with founded language in URL
		$this->easylang = new EasyLang('languages/', $language_short_name);
	}

	/**
	 * @param string $constant
	 *
	 * @return string
	 */
	public function getTranslate($constant)
	{
		return $this->easylang->getTranslate($constant);
	}
}

$demo = new Demo();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $demo->getTranslate('MY_TITLE') ?></title>
	<style>
		.live-example {
			color: green;
		}

		.warning {
			color: red;
		}
	</style>
</head>
<body>

<p>Here is a live example of EasyLang:<?php
	if ($demo->easylang->getLang() == 'de') {
		echo '<br><span class="warning">Note: Used ONLINE TRANSLATOR for translation.</span>';
	} ?>
</p>

<div class="live-example">
	<p><?= $demo->getTranslate('HELLO_WORLD') ?></p>

	<p><?= $demo->getTranslate('HOW_ARE_YOU') ?></p>

	<p><?= $demo->getTranslate('INVALID_CONSTANT_TEST') ?></p>
</div>

<p>You can change language with URL like this:<br>
	<code>http://localhost/path/index.php/en</code>
	<br>Or<br>
	<code>http://localhost/path/index.php/fa</code>
	<br>Or<br>
	<code>http://localhost/path/index.php/de</code>
</p>

<div>
	<p>These above strings are loaded from <code>.ini</code> files which are contain the text of translation.<br>
		You can use EasyLang to simply load your desired language at the runtime.
</div>

</body>
</html>
