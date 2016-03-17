# EasyLang

A simple PHP class for creating pages with multiple languages 

By using this class you can use multiple languages in PHP pages.
Languages are saved in a UTF-8 `.ini` file and will load by their language short names.
This class provided with Getters and Setters, so you can easily customize it.

# Usage:

First include EasyLang file:

`require_once 'easylang.php';`

Then you should make a `.ini` file which can be found in `languages` folder of demo and name it as its language short name. For example we create a file with name of `en.ini` for English language.

Now we can make an object from EasyLang like this:

```php
$languages_path = 'languages/'; // Don't forget '/' at the end of path

$language_short_name = 'en';

$is_rtl = false; // Some languages are in right to left direction. This will be useful if we store this property in EasyLang for later use_

$translate = new EasyLang( $languages_path, $language_short_name, $is_rtl_ );
```

So, EasyLang will find a file with name of `en.ini` in `languages` folder.

Inside that `.ini` file we have a constant and a translate like this:

`MY_TITLE = "Here is my page Title"`

Now we can use this constant like this:

`echo $translate->getTranslate( 'MY_TITLE' );`

# Demo Script

There is an `index.php` in project that contains an example to show how to use EasyLang in your code.
