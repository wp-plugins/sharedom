<?php
/**
* Plugin Name: Sharedom
* Description: Responsive sharing buttons for sharing current URL to Facebook, Twitter and Google+
* Version: 0.0.1
* Author: Kunal Nagar
* Author URI: http://kunalnagar.in
* License: GPLv2
*/

add_action('plugins_loaded', array(Sharedom::get_instance(), 'plugin_setup'));

class Sharedom {

	protected static $instance = NULL;

	public static function get_instance() {
		NULL === self::$instance and self::$instance = new self;
		return self::$instance;
	}

	public function plugin_setup() {
		add_action('wp_enqueue_scripts', array($this, 'sharedom_scripts'));
		add_shortcode('sharedom', array($this, 'sharedom_func'));
	}

	public function sharedom_scripts() {
		wp_enqueue_style('normalize-css', plugins_url() . '/sharedom/css/normalize.css');
		wp_enqueue_style('purecss-css', plugins_url() . '/sharedom/third_party/pure-min.css');
		wp_enqueue_style('fontawesome-css', plugins_url() . '/sharedom/third_party/font_awesome/css/font-awesome.css');
		wp_enqueue_style('buttons-css', plugins_url() . '/sharedom/css/buttons.css');
		wp_enqueue_script('buttons-js', plugins_url() . '/sharedom/js/buttons.js', array('jquery'));
	}

	public function sharedom_func($atts) {
		extract(shortcode_atts(
		array(
			'atts' => array(
					'facebook' => 1,
					'twitter' => 1,
					'googleplus' => 1
				)
			), $atts)
		);
		ob_start();
		include 'front/buttons.php';
		return ob_get_clean();
	}
}

