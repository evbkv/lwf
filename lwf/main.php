<?php

/**
 *
 * Main framework class.
 *
 */

class LWF {

	// Landing page

	public static function landing($lang = 0) {
		include_once 'lwf/landing.php';
		html::header('landing', $lang);
		include_once 'lwf/structure.php';
		html::footer();
	}

	// Admin page (for future)

	public static function admin($lang = 0) {
		include_once 'lwf/admin.php';
		html::header('admin');
		include_once 'lwf/structure.php';
		html::footer();
	}

	// Error page

	public static function err() {
	    header("HTTP/1.0 404 Not Found");
		include_once 'lwf/err.php';
		html::header('error');
		echo '<p>404 Error: page not found.</p>';
		html::footer();
	}

}