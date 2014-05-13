<?php

/**
 *
 * Easy Lang PHP Class.
 *
 * By using this class you can use multiple languages in PHP pages.
 * Languages are saved in a UTF-8 .ini file and will load by their language short names.
 * This class provided with Getters and Setters,So you can easily customize it.
 *
 * ------------------------------------------ *
 * USAGE:
 *
 * First include EasyLang file:
 *
 * require_once( 'easylang.php' );
 *
 * Then you should make a .ini file that can be found in 'languages' folder of demo and name it as its language short
 * name. for example we create a file with name of 'en.ini' for english language.
 * Now we can make an object from Easy Lang like this:
 *
 * $languages_path = 'languages/'; // Don't forget '/'
 * $language_short_name = 'en';
 *
 * $translate = new EasyLang( $languages_path, $language_short_name );
 *
 * So, Easy Lang find a file with name of 'en.ini' in 'languages' folder
 *
 * in .ini file we have a Constant and a Translate like this:
 *
 * MY_TITLE = "Here is my page Title"
 *
 * Now we can use this constant like this:
 *
 * echo $translate->getTranslate( 'MY_TITLE' );
 *
 * ------------------------------------------ *
 *
 * For more details and live example, please see demo.
 *
 * Created by Hesam Gholami.
 * Date: 3/27/2014
 * Last Update: 5/13/2014
 *
 * MIT Licensed.
 */
class EasyLang
{
	private $lang = '';
	private $lang_path = '';
	private $translates = array ();

	/**
	 * @param $languages_path
	 * @param $language_short_name
	 */
	function __construct( $languages_path, $language_short_name )
	{
		$this->refreshTranslates( $languages_path, $language_short_name );
	}

	/**
	 * @param $language_short_name
	 */
	public function changeLanguage($language_short_name)
	{
		$this->refreshTranslates($this->getLangPath(), $language_short_name);
	}

	/**
	 * @param $languages_path
	 * @param $language_short_name
	 *
	 * refresh texts of translates and also could change translate language
	 */
	public function refreshTranslates( $languages_path, $language_short_name )
	{
		$this->setLang( $language_short_name );
		$this->setLangPath( $languages_path );

		// make path of translate file: PATH + [LANGUAGE SHORT NAME] + '.ini'
		$file_path = $this->getLangPath() . $this->getLang() . '.ini';

		( file_exists( $file_path ) ) ? $this->setAllTranslates( parse_ini_file( $file_path ) )
			: die( "Language file does not exist.\n" );
	}

	/**
	 * @param $constant
	 *
	 * @return mixed
	 *
	 * get constant and return its text from translates
	 */
	public function getTranslate( $constant )
	{
		$tmp_trans = $this->getAllTranslates();

		return isset($tmp_trans[$constant]) ? $tmp_trans[$constant]	: '**'.$constant.'**';
	}

	/**
	 * @param string $translates
	 */
	private function setAllTranslates( $translates )
	{
		$this->translates = $translates;
	}

	/**
	 * @return mixed
	 */
	public function getAllTranslates()
	{
		return $this->translates;
	}

	/**
	 * @param string $lang_path
	 */
	private function setLangPath( $lang_path )
	{
		$this->lang_path = $lang_path;
	}

	/**
	 * @return string
	 */
	public function getLangPath()
	{
		return $this->lang_path;
	}

	/**
	 * @param string $lang
	 */
	private function setLang( $lang )
	{
		$this->lang = $lang;
	}

	/**
	 * @return string
	 */
	public function getLang()
	{
		return $this->lang;
	}
} 