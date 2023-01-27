<?php

/**
 *
 * Html general class.
 *
 */

class html {

	public static function header($page, $lang = 0) {
		$css = date::$THEME;
		if ($page != 'landing') $css = $page;
		echo '
		<html lang="'.date::$LANG[$lang].'">
		    <head>
				<title>'.date::$NAME[$lang].' | '.strip_tags(date::$TITLE[$lang]).'</title>
				<link rel="stylesheet" type="text/css" href="css/'.$css.'.css">
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
			</head>
			<body>
		';
	}
	
	public static function footer() {
		echo '
			</body>
			
		</html>
		';
	}

}