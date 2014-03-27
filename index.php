<?php
/**
 *
 * Easy Lang demo page.
 *
 * Created by Hesam Gholami.
 * Date: 3/27/2014
 *
 * MIT Licensed.
 */

// include EasyLang Class
include_once('easylang.php');

/**
 * Class Demo
 */
class Demo
{

	/**
	 *
	 * This Constructor will parse URL to find language that should be Use.
	 *
	 */
	function __construct()
	{
		$route = substr($_SERVER['REQUEST_URI'], strlen($_SERVER['SCRIPT_NAME']));
		$part = explode ("/", $route);

		$language_short_name = '';

		if(isset($part[1]))
		{
			switch($part[1])
			{
				case 'fa':
					$language_short_name = 'fa';
					break;

				case 'de':
					$language_short_name = 'de';
					break;

				default:
					$language_short_name = 'en';
			}
		}
		else
		{
			$language_short_name = 'en';
		}

		$this->easylang = new EasyLang('',$language_short_name);
	}

	/**
	 * @param $constant
	 *
	 * @return mixed
	 */
	public function getTranslate( $constant )
	{
		return $this->easylang->getTranslate( $constant );
	}
}

$demo = new Demo();

?><html>
<head>
	<title><?php echo $demo->getTranslate( 'MY_TITLE' ) ?></title>
</head>
<body>

<p>Here is a live example of EasyLang:<?php
if($demo->easylang->getLang() == 'de')	echo '<br>Note: Used ONLINE TRANSLATOR for translation.' ?></p>

<div style="color: rgba(183, 146, 54, 0.6)">
	<p><?php echo $demo->getTranslate( 'HELLO_WORLD' ) ?></p>
	<p><?php echo $demo->getTranslate( 'HOW_ARE_YOU' ) ?></p>
</div>

<p>You can change language with URL like this:<br>
<code>http://localhost/path/index.php/en</code><br>
Or<br>
<code>http://localhost/path/index.php/fa</code><br>
Or<br>
<code>http://localhost/path/index.php/de</code>
</p>

<div><p>By using EasyLang PHP class you can use multiple languages in PHP pages.<br>
	 Languages are saved in a UTF-8 .ini file and will load by their language short names.<br>
	 This class provided with Getters and Setters,So you can easily customize it.<br><br>

	* ------------------------------------------ *<br>
	 USAGE:<br><br>

	 First include EasyLang file:<br><br></p>

	 <pre>include_once( 'easylang.php' );</pre><p>

	 Then you should make a .ini file that can be found in 'languages' folder of demo and name it as its language short
	 name. for example we create a file with name of 'en.ini' for english language.
	 Now we can make an object from Easy Lang like this:<br><br></p>

 <pre>$languages_path = 'languages/'; // Don't forget '/'
$language_short_name = 'en';

$translate = new EasyLang( $languages_path, $language_short_name );</pre><br><p>

	 So, Easy Lang find a file with name of 'en.ini' in 'languages' folder<br><br>

	 in .ini file we have a Constant and a Translate like this:<br><br>

	 <code>MY_TITLE = "Here is my page Title"</code><br><br>

	 Now we can use this constant like this:<br><br></p>

	 <pre>echo $translate->getTranslate( 'MY_TITLE' );</pre><br><p>

	* ------------------------------------------ *<br><br><br><br>



	 Created by Hesam Gholami.<br>
	 Date: 3/27/2014<br><br>

	 MIT Licensed.</p></div>

</body>
</html>
