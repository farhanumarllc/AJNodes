<?php
/**
 * Functions for custom post types
 *
 * @link https://developer.wordpress.org/themes/basics/post-types/
 *
 * @package AJNodes
 * @since 1.0.0
 */

use AJNodes\CPT\WP_Theme_CPT;

new WP_Theme_CPT(
	array(
		'labels'       => array(
			'singular_capital'   => 'Service',
			'plural_capital'     => 'Services',
			'singular_lowercase' => 'service',
			'plural_lowercase'   => 'services',
			// CPT Slug & Name.
			'register_key'       => 'service',
			'slug'               => 'service',
		),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
		'menu_icon'    => 'dashicons-admin-settings',
		'public'       => true,
		'show_in_menu' => true,
		'show_ui'      => true,
		'taxonomies'   => array(
			array(
				'slug'          => 'service',
				'register_key'  => 'service', // if not given default is slug value.
				'name'          => 'Category',
				'singular_name' => 'Category',
				'plural_name'   => 'Categories',
			),

		),
	)
);
new WP_Theme_CPT(
	array(
		'labels'    => array(
			'singular_capital'   => 'Project',
			'plural_capital'     => 'Projects',
			'singular_lowercase' => 'project',
			'plural_lowercase'   => 'projects',
			// CPT Slug & Name.
			'register_key'       => 'project',
			'slug'               => 'project',
		),
		'supports'  => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
		'menu_icon' => 'dashicons-image-filter',
		'public'    => true,
			'taxonomies'   => array(
			array(
				'slug'          => 'project',
				'register_key'  => 'project', // if not given default is slug value.
				'name'          => 'Category',
				'singular_name' => 'Category',
				'plural_name'   => 'Categories',
			),

		),

	)
);

