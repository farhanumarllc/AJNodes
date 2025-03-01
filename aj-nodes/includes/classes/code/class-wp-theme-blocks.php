<?php
/**
 * Blocks related functions
 *
 * @link
 *
 * @package AJNodes
 * @since 1.0.0
 */

namespace AJNodes\Blocks;

use AJNodes;

/**
 * Template Class For Blocks
 *
 * Template Class
 *
 * @category Setting_Class
 * @package  AJNodes
 */
class WP_Theme_Blocks {
	/**
	 * Define class Constructor
	 **/
	public function __construct() {
		add_action( 'init', array( $this, 'register_acf_blocks' ) );
	}

	/**
	 * A function in which all acf blocks are registered
	 *
	 *  @return void
	 */
	public function register_acf_blocks() {

		register_block_type( AJNodes_BLOCK_DIR . '/section-container' );
		// Register a block - theme-table.
		self::register_acf_block( 'theme-table' );
		// Register a block - FAQ.
		self::register_acf_block( 'faqs' );
		// Register a block - Text Slider.
		self::register_acf_block( 'text-slider' );
		// Register a block - Benefits.
		self::register_acf_block( 'benefits' );
		// Register a block - Image Tile.
		self::register_acf_block( 'image-tile' );
		// Register a block - Staff Augmentation.
		self::register_acf_block( 'staff-augmentation' );
		// Register a block - Our Projects.
		self::register_acf_block( 'our-projects' );
		// Register a block - Our Team.
		self::register_acf_block( 'our-team' );
		// Register a block - How We Work.
		self::register_acf_block( 'how-we-work' );
		// Register a block - Our Experties.
		self::register_acf_block( 'our-experties' );
		// Register a block - Why Us.
		self::register_acf_block( 'why-us' );
		// Register a block - Featured Para.
		self::register_acf_block( 'featured-para' );
		// Register a block - Our Services.
		self::register_acf_block( 'our-services' );
		// Register a block - Three Column Tiles.
		self::register_acf_block( 'three-column-tiles' );
		// Register a block - Media Alongside Text.
		self::register_acf_block( 'media-alongside-text' );
		// Register a block - Jump Location.
		self::register_acf_block( 'jump-location' );
		// Register a block - Development Process.
		self::register_acf_block( 'development-process' );
		// Register a block - Midpage CTA.
		self::register_acf_block( 'midpage-cta' );
		// Register a block - Section Head.
		self::register_acf_block( 'section-head' );
		// Register a block - AcfBlock.
		self::register_acf_block(
			'acfblock',
			true,
			array( 'assets/build/vendors/owl.carousel.min.js', 'assets/build/vendors/organic-tab.js' ), // name will be wp-theme-owl and wp-theme-organic-tab.
		);
		// [register_here].
	}


	/**
	 * A function which is used to register a block
	 *
	 * @param string  $block_name is the name of the block.
	 * @param boolean $has_script is boolean value that determines if block need to include script or not.
	 * @param array   $block_scripts is array to use when need external file in the block.
	 *
	 *  @return void
	 */
	protected static function register_acf_block( $block_name = null, $has_script = false, $block_scripts = null ) {
		if ( $has_script ) {
			$block_script_order = array( 'jquery' );
			$dependencies       = array();
			$block_version      = filemtime( get_template_directory() . '/blocks/' . $block_name . '/' . $block_name . '.js' );
			if ( $block_scripts ) {
				$dependencies = AJNodes::enqueue_scripts( $block_scripts );
			}
			$block_script_order = array_merge( $block_script_order, $dependencies );
			AJNodes::enqueue_script( 'blocks/' . $block_name . '/' . $block_name . '.js', $block_script_order );
		}
		register_block_type( AJNodes_BLOCK_DIR . '/' . $block_name );
	}
}
new WP_Theme_Blocks();
