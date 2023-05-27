<?php

/**
 *
 * Structure landing page.
 *
 */

// Header

view::header($lang);

// Sections

$arr = array_keys(date::$SECTIONS);
foreach ($arr as $section) {
	view::openSection($section);
	view::firstText($section, $lang);
	view::imgBlock3($section, $lang);
	view::imgBlock4($section, $lang);
	view::imgBlock6($section, $lang);
	view::secondText($section, $lang);
	view::benefits($section, $lang);
	view::deg360($section);
	view::userCode($section, $lang);
	view::closeSection();
	view::now($section, $lang);
}

// Footer

view::footer($lang);
