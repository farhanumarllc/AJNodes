<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * Please note that missing files will produce a fatal error.
 *
 * @package AJNodes
 * @since 1.0.0
 */

if ( ! defined( 'AJNodes_BLOCK_DIR' ) ) {
	define( 'AJNodes_BLOCK_DIR', __DIR__ . '/blocks' );
}


if ( ! defined( 'AJNodes_DEFAULT_IMAGE' ) ) {
	define( 'AJNodes_DEFAULT_IMAGE', esc_url( get_template_directory_uri() ) . '/assets/build/images/admin/defaults/default-image.webp' );
}


$ajn_folder_includes = ajn_includes( __DIR__ . '/includes/classes' );
/**
 * Checks if any file have error while including it.
 */
foreach ( $ajn_folder_includes as $ajn_folders ) {
	foreach ( $ajn_folders as $ajn_file ) {
		$ajn_filepath = locate_template( str_replace( __DIR__ . '/', '', $ajn_file ) );
		if ( file_exists( $ajn_filepath ) ) {
			require_once $ajn_filepath;
		} else {
			echo 'Unable to load configuration file ' . esc_html( basename( $ajn_file ) ) . ' please check file name in functions.php in your current active theme.';
		}
	}
}
/**
 * Get folder Dir
 *
 * @param string $directory Folder dir path.
 */
function ajn_includes( $directory ) {
	$folders = array();

	// Get all files and folders in the specified directory.
	$items = scandir( $directory );

	// Iterate through each item.
	foreach ( $items as $item ) {
		$full_path = $directory . '/' . $item;

		// Check if the item is a directory and not '.' or '..'.
		if ( is_dir( $full_path ) && '.' !== $item && '..' != $item ) {
			$folders[ $item ] = glob( __DIR__ . '/includes/classes/' . $item . '/*.php' );
		}
	}
	$folders['other'] = array(
		__DIR__ . '/includes/cpt.php',
		__DIR__ . '/includes/project.php',
	);

	return $folders;
}
