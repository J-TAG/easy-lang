easy-lang
=========

a Simple PHP Class for creating pages with multiple languages 

By using this class you can use multiple languages in PHP pages.
Languages are saved in a UTF-8 .ini file and will load by their language short names.
This class provided with Getters and Setters,So you can easily customize it.

=========

USAGE:

First include EasyLang file:

<code>include_once( 'easylang.php' );</code>

Then you should make a .ini file that can be found in 'languages' folder of demo and name it as its language short
name. for example we create a file with name of 'en.ini' for english language.
Now we can make an object from Easy Lang like this:

<code>$languages_path = 'languages/'; // Don't forget '/'</code>
<code>$language_short_name = 'en';</code>

<code>$translate = new EasyLang( $languages_path, $language_short_name );</code>

So, Easy Lang find a file with name of 'en.ini' in 'languages' folder

in .ini file we have a Constant and a Translate like this:

<code>MY_TITLE = "Here is my page Title"</code>

Now we can use this constant like this:

<code>echo $translate->getTranslate( 'MY_TITLE' );</code>

=========

For more details and live example, please see demo.
