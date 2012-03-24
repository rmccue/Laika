<?php
/*
Plugin Name: Laika
Description: An example plugin to show how to use the Sputnik API
Version: 1.1
Author: Ryan McCue
Author URI: http://ryanmccue.info/
Sputnik ID: laika
*/

class Laika {
	public static function verify() {
		remove_action('all_admin_notices', array('Laika', 'report_error'));
		Sputnik::check(__FILE__, array('Laika', 'bootstrap'));
	}

	public static function report_error() {
		echo '<div class="error"><p>Please install &amp; activate Sputnik to enable Laika.</p></div>';
	}

	public static function bootstrap() {
		add_filter('update_footer', array(__CLASS__, 'footer'), 20);
	}

	public static function footer($text) {
		$text = 'Dedicated to Laika (1954&ndash;1957) &bull; ' . $text;
		return $text;
	}
}

add_action('sputnik_loaded', array('Laika', 'verify'));
add_action('all_admin_notices', array('Laika', 'report_error'));