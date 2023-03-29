<?php

/**
 *
 * View landing page class.
 *
 */

class view {

	// Header

	public static function header($lang) {
		$lang_n = 0;
		foreach (date::$LANG as $value) $lang_n = $lang_n + 1;
		echo '
			<header>
				<a name="top"></a>
				<div class="headerImage">
					<div class="wrapper">
						<a href=""><div class="logotype"></div></a>
						<nav>
							<ul>';
								$arr = array_keys(date::$SECTIONS);
								foreach ($arr as $section) echo '<li><a href="#'.$section.'">'.date::$SECTIONS[$section][$lang].'</a></li>';
		echo					'<li><a href="#footer">'.date::$CONTACT_US[$lang].'</a></li>';
								if ($lang_n > 1) {
									echo '<li>';
									$n = 1;
									foreach (date::$LANG as $value) {
										echo '<a href="'.$value.'">'.$value.'</a>';
										if ($n < $lang_n) echo ' | ';
										$n = $n + 1;
									}
									echo '</li>';
								}
		echo				'</ul>
						</nav>
						<h1>'.date::$TITLE[$lang].'</h1>
						<a class="button" href="#footer">'.date::$CONTACT_US[$lang].'</a>
						<h2><span class="whiteBg">'.date::$OFFER[$lang].'</span></h2>
					</div>
				</div>
				<div class="headerContacts">
					<div class="wrapper"><div>
						<span class="color1">'.date::$LOCATION1[$lang].'</span><br>
						'.date::$LOCATION2[$lang].'
					</div><div>
						<span class="color1">'.date::$PHONE1[$lang].'</span><br>
						'.date::$PHONE2[$lang].'
					</div><div>
						<span class="color1">'.date::$EMAIL1[$lang].'</span><br>
						<a href="mailto:'.date::$EMAIL2[$lang].'">'.date::$EMAIL2[$lang].'</a>
					</div><div>
						<a class="social_net pc" style="background-image: url(\'img/lwf/sn-ico/'.date::$SOCIAL_NETWORK[$lang].'-logo.png\')" href="'.date::$SOCIAL_NETWORK_LINK[$lang].'" target="_blank"></a>
						<span class="color2">'.date::$OTHER1[$lang].'</span><br>
						'.date::$OTHER2[$lang].'
					</div><div class="smartphone">
						<a class="social_net" style="background-image: url(\'img/lwf/sn-ico/'.date::$SOCIAL_NETWORK[$lang].'-logo.png\')" href="'.date::$SOCIAL_NETWORK_LINK[$lang].'" target="_blank"></a>
					</div></div>
				</div>
			</header>

			<div class="menuIco" onclick="document.getElementById(\'menu\').style.visibility=\'visible\'"></div>
			<div id="menu" class="menu">
				<div class="close" onclick="document.getElementById(\'menu\').style.visibility=\'hidden\'"></div>
				<ul>';
					$arr = array_keys(date::$SECTIONS);
					foreach ($arr as $section) echo '<li><a href="#'.$section.'" onclick="document.getElementById(\'menu\').style.visibility=\'hidden\'">'.date::$SECTIONS[$section][$lang].'</a></li>';
		echo		'<li><a href="#footer" onclick="document.getElementById(\'menu\').style.visibility=\'hidden\'">'.date::$CONTACT_US[$lang].'</a></li>';
			if ($lang_n > 1) {
				echo '<li>';
				$n = 1;
				foreach (date::$LANG as $value) {
					echo '<a href="'.$value.'">'.$value.'</a>';
					if ($n < $lang_n) echo ' | ';
					$n = $n + 1;
				}
				echo '</li>';
			}
		echo	'</ul>
			</div>

			<div id="viewer" class="viewer" onclick="document.getElementById(\'viewer\').style.visibility=\'hidden\'"></div>

			<main>
		';
	}

	// Sections

	public static function openSection($section) {
		echo '
			<article class="wrapper">
				<a id="'.$section.'"></a>
		';
	}

	public static function closeSection() {
		echo '
			</article>
		';
	}

	// Block - First text

	public static function firstText($section, $lang) {
		if (array_key_exists($section, date::$FIRST_TEXT) == true) {
			echo '
				<div class="firstText">
					<h2>'.date::$FIRST_TEXT[$section][$lang][0].'</h2>
					<p>'.date::$FIRST_TEXT[$section][$lang][1].'</p>
				</div>
			';
		}
	}

	// Block - Second text

	public static function secondText($section, $lang) {
		if (array_key_exists($section, date::$SECOND_TEXT) == true) {
			echo '
				<div class="secondText">
					<img src="img/'.date::$SECOND_TEXT[$section][0].'" alt="'.date::$SECOND_TEXT[$section][1][$lang][0].'">
					<h2>'.date::$SECOND_TEXT[$section][1][$lang][0].'</h2>
					<p>'.date::$SECOND_TEXT[$section][1][$lang][1].'</p>
				</div>
			';
		}
	}

	// Block - Image block with 3 pictures, text and button

	public static function imgBlock3($section, $lang) {
		if (array_key_exists($section, date::$IMG_BLOCK3) == true) {
			echo '
				<div class="imgBlock">';
			foreach (date::$IMG_BLOCK3[$section] as $imgTxt) {
				echo '
					<div class="img3" style="background-image:url(\'img/'.$imgTxt[0].'\');">
						<div class="imgTxtBg"><h3>'.$imgTxt[1][$lang].'</h3></div>
						<a class="button" href="#footer">'.$imgTxt[2][$lang].'</a>
					</div>';
			}
			echo '
				</div>
			';
		}
	}

	// Block - Image block with 4 pictures and text

	public static function imgBlock4($section, $lang) {
		if (array_key_exists($section, date::$IMG_BLOCK4) == true) {
			echo '
				<div class="imgBlock">';
			foreach (date::$IMG_BLOCK4[$section] as $imgTxt) {
				echo '
					<div class="img4" style="background-image:url(\'img/'.$imgTxt[0].'\');';
				if ($imgTxt[1][$lang] == '') echo ' cursor:pointer;" onclick="document.getElementById(\'viewer\').style.visibility=\'visible\'; document.getElementById(\'viewer\').style.backgroundImage=\'url(img/'.$imgTxt[0].')\';"';
				else echo '"';
				echo '>';
				if ($imgTxt[1][$lang] != '') echo '<div class="imgTxtBg"><h3>'.$imgTxt[1][$lang].'</h3></div>';
				echo '</div>';
			}
			echo '
				</div>
			';
		}
	}

	// Block - Image block with 6 pictures and text

	public static function imgBlock6($section, $lang) {
		if (array_key_exists($section, date::$IMG_BLOCK6) == true) {
			echo '
				<div class="imgBlock">';
			foreach (date::$IMG_BLOCK6[$section] as $imgTxt) {
				echo '
					<div class="img6" style="background-image:url(\'img/'.$imgTxt[0].'\');';
				if ($imgTxt[1][$lang] == '') echo ' cursor:pointer;" onclick="document.getElementById(\'viewer\').style.visibility=\'visible\'; document.getElementById(\'viewer\').style.backgroundImage=\'url(img/'.$imgTxt[0].')\';"';
				else echo '"';
				echo '>';
				if ($imgTxt[1][$lang] != '') echo '<div class="imgTxtBg"><h3>'.$imgTxt[1][$lang].'</h3></div>';
				echo '</div>';
			}
			echo '
				</div>
			';
		}
	}

	// Block - Benefits

	public static function benefits($section, $lang) {
		if (array_key_exists($section, date::$BENEFITS) == true) {
			echo '
				<div class="imgBlock">';
			foreach (date::$BENEFITS[$section] as $benefit) {
				echo '
					<span>'.$benefit[$lang].'</span>';
			}
			echo '
				</div>
			';
		}
	}

	// Block - 360 deg

	public static function deg360($section) {
		if (array_key_exists($section, date::$DEG360) == true) {
			echo '
				<script src="js/jquery-3.3.1.min.js"></script>
				<script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css">

				<div id="panorama" style="background-image: url(\'img/'.date::$DEG360[$section][0].'\');"></div>
				
				<script>

				pannellum.viewer("panorama", {
					"type": "equirectangular",
					"panorama": "'.date::$DEG360[$section][1].'?size=2560x1280&quality=96&sign=5ed8820f107d1a06d35f02f3269c6acf&type=album"
				});

				</script>
			';
		}
	}

	// Block - Now

	public static function now($section, $lang) {
		if (array_key_exists($section, date::$NOW) == true) {
			echo '
				<div class="now">
					<div class="wrapper">
						<h2>'.date::$NOW[$section][$lang].'</h2>
						<a class="button" href="#footer">'.date::$CONTACT_US[$lang].'</a>
					</div>
				</div>
			';
		}
	}


	// Footer

	public static function footer($lang) {
		echo '
		 	</main>
		 	
			<footer>
				<a id="footer"></a>
				<div class="footerInnerWrapper">
					<h2>'.date::$OFFER[$lang].'</h2>
				</div>
				<div class="footerContacts">
					<div class="footerInnerWrapper">
						<div class="contacts">
							<h3>'.date::$CONTACT_US[$lang].'</h3>
							<div>
								'.date::$LOCATION1[$lang].'<br>
								'.date::$LOCATION2[$lang].'
							</div>
							<div>
								'.date::$PHONE1[$lang].'<br>
								'.date::$PHONE2[$lang].'
							</div>
							<div>
								'.date::$EMAIL1[$lang].'<br>
								<a href="mailto:'.date::$EMAIL2[$lang].'">'.date::$EMAIL2[$lang].'</a>
							</div>
							<a class="social_net" style="background-image: url(\'img/lwf/sn-ico/'.date::$SOCIAL_NETWORK[$lang].'-logo.png\')" href="'.date::$SOCIAL_NETWORK_LINK[$lang].'" target="_blank"></a>
						</div>
						<div class="form">';

		if (isset($_POST['name']) && isset($_POST['email']) && $_POST['lastname']=='') {
			echo '<p>'.$_POST['name'].', '.date::$FORM_SENDED[$lang].'!</p>';

			$to  = "<your@email.com>";
			$subject = "Message from 3drender.pro";
			$message = '<p>Name: '.$_POST['name'].'</p><p>E-mail: '.$_POST['email'].'</p><p>Message: '.$_POST['text'].'</p>';
			$headers  = "Content-type: text/html; charset=utf-8 \r\n";
			$headers .= "From: <mail@lwf.com>\r\n";
			$headers .= "Reply-To: mail@lwf.com\r\n";
			mail($to, $subject, $message, $headers);

		} else {
			echo '

							<form method="post">
								<input type="text" id="sp" name="lastname">
								<input type="text" name="name" placeholder="'.date::$FORM_NAME[$lang].'" required>
								<input type="email" name="email" placeholder="'.date::$FORM_EMAIL[$lang].'" required>
								<textarea name="text">'.date::$FORM_MESSAGE[$lang].'</textarea>
								<input type="submit" value="'.date::$FORM_SEND[$lang].'">
							</form>
							<script>document.getElementById(\'sp\').style.display = \'none\'</script>
							';
		}
		echo '
						</div>
					</div>
				</div>

				<div class="copyright">
					© '.date::$NAME[$lang].'
				</div>

			</footer>

			<div id="ontop" class="ontop" onclick="window.scrollTo(0, 0);"></div>
			<script>
				window.onscroll = function() {
					var scrolled = window.pageYOffset || document.documentElement.scrollTop;
					var minScrolled = 600;
					if (scrolled > minScrolled) document.getElementById(\'ontop\').style.visibility = \'visible\';
					if (scrolled < minScrolled) document.getElementById(\'ontop\').style.visibility = \'hidden\';
				}
			</script>
		';
	}

}
