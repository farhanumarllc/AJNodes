<?php
/**
 * Setup function for the project
 *
 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/
 *
 * @package AJNodes
 * @since 1.0.0
 */

namespace AJNodes\Script;

use AJNodes;
/**
 * Theme assets
 *
 * Define variable to store asset directory folder in it.
 *
 * That can be used afterward to call stylesheet / scripts etc
 */

// Time format for the_time().
define( 'AJNodes_PROJECT_DTFORMAT', 'F j, Y' );
/**
 * Theme assets
 *
 * Enqueue and Dequeue required files
 */
class WP_Theme_Scripts {
	/**
	 * Define class Constructor
	 **/
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'theme_assets' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_assets' ) );
	}
	/**
	 * Enqueue Frontend Assets
	 *
	 * @return void
	 */
	public function theme_assets() {
		// Enqueue theme styles.
		AJNodes::enqueue_style( 'assets/build/styles.min.css' );
		// Eliminate the emoji script.
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		// Enqueue comments reply script on single post pages.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if ( ! is_admin() && ! is_user_logged_in() ) {
			// Deregister dashicons on frontend.
			wp_deregister_style( 'dashicons' );
		}

		wp_enqueue_script( 'jquery' );
		// Register project scripts.
		AJNodes::enqueue_script(
			'assets/build/scripts.min.js',
			array( 'jquery' ),
			'localVars',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => esc_html( wp_create_nonce( 'ajax_nonce' ) ),
			)
		);
	}
	/**
	 * Enqueue Backend Assets
	 *
	 * @return void
	 */
	public function admin_assets() {
		AJNodes::enqueue_script(
			'assets/build/vendors/admin-scripts.js',
			array( 'jquery' ),
			'localVars',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => esc_html( wp_create_nonce( 'admin_ajax_nonce' ) ),
			)
		);
		AJNodes::enqueue_style( 'assets/build/editor.min.css' );
	}
}
new WP_Theme_Scripts();

