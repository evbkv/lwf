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
		echo '<!DOCTYPE html><html lang="'.date::$LANG[$lang].'" prefix="og: http://ogp.me/ns#">
		    <head>
				<title>'.date::$NAME[$lang].'</title>
				<link rel="canonical" href="'.date::$WEB.'">
				<link rel="stylesheet" type="text/css" href="css/'.$css.'.css?' . rand() . '">
				<link rel="icon" href="'.date::$WEB.'favicon.svg" type="image/svg+xml">
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta name="description" content="'.date::$DESCRIPTION[$lang].'">
				<meta name="keywords" content="'.date::$KEYWORDS[$lang].'">
				';
		include 'open-graph.php';
		if (date::$SOCIAL_NETWORK[$lang] == 'vk') {
            echo '
<meta property="vk:group" content="'.date::$SOCIAL_NETWORK_LINK[$lang].'">';
		}
	    echo '
			</head>
			<body>
		';
	}
	
	public static function footer() {
	    include 'scripts.php';
		echo '
			</body>
			
		</html>
		';
	}


}
