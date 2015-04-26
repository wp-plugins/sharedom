<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://kunalnagar.in
 * @since      1.0.0
 *
 * @package    Sharedom
 * @subpackage Sharedom/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sharedom
 * @subpackage Sharedom/public
 * @author     Kunal Nagar <knlnagar@gmail.com>
 */
class Sharedom_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sharedom_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sharedom_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name . '-normalize-css', plugin_dir_url( __FILE__ ) . 'css/vendor/normalize.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '-purecss-css', plugin_dir_url( __FILE__ ) . 'css/vendor/pure-min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '-fontawesome-css', plugin_dir_url( __FILE__ ) . 'css/vendor/font_awesome/css/font-awesome.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sharedom-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sharedom_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sharedom_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sharedom-public.js', array( 'jquery' ), $this->version, false );

	}

	public function create_sharedom_shortcode() {
		echo 'woot';
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
		include 'partials/sharedom-public-display.php';
		return ob_get_clean();
	}

}
