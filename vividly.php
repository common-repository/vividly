<?php
/*
Plugin Name: Vividly
Version: 0.0.1
Author: Ricco Førgaard mailto:ricco@fiskeben.dk
License: MIT
*/

class VividlyPlugin {

	public function __construct() {
		add_action('wp_head', array($this, 'add_stylesheet'));
	}

	private function version() {
		return "0.0.1";
	}

	public 	function add_stylesheet() {
		$stylesheet_url = $this->get_stylesheet_url();
		echo $this->get_toggle_javascript($stylesheet_url);

		if ($this->read_cookie()) {
			$stylesheet_tag = '<link id="high-contrast-stylesheet" rel="stylesheet" tyle="text/css" href="' . $stylesheet_url . '" media="screen"/>';

			echo $stylesheet_tag;
		}
	}

	private function get_stylesheet_url() {
		$stylesheet_dir = get_stylesheet_directory_uri();
		$stylesheet_url = $stylesheet_dir . "/vividly.css";
		$stylesheet_url .= "?ver=" . $this->version();
		
		return $stylesheet_url;
	}

	private function read_cookie() {
		if (array_key_exists('vividly-plugin-cookie', $_COOKIE)) {
			return $_COOKIE['vividly-plugin-cookie'] == 'on';
		}
		
		return false;
	}

	private function get_toggle_javascript($stylesheet_url) {
		$javascript_url = plugins_url() . "/vividly/toggler.js";
		$javascript_string = '<script>var __high_contrast_stylesheet_url = "' . $stylesheet_url . '";</script>';
		$javascript_string .= '<script type="text/javascript" src="' . $javascript_url . '"></script>';

		return $javascript_string;
	}

}

new VividlyPlugin();

?>