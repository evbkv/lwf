<!DOCTYPE html><?php

/**
 *
 * Index.
 *
 */

include_once 'date.php';
include_once 'lwf/html.php';
include_once 'lwf/main.php';

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$path = explode('/', $host)[$num];

// Select language

$lang = $lang_n = 0;
$lang_flag = false;
foreach (date::$LANG as $value) {
	if ($path == $value) {
		$lang = $lang_n;
		$lang_flag = true;
	}
	else $lang_n = $lang_n + 1;
}

// Routing

if ($path == '' or $lang_flag == true) {
	if ($path == '') {
	    if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    		$lang_serv = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    		$lang = array_search($lang_serv, date::$LANG);
	    }
	}
	LWF::landing($lang);
}
elseif ($path == 'admin') {
	LWF::admin();
}
else {
	LWF::err();
}