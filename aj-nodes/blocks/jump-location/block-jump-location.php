<?php
/**
 * Block Name: Jump Link
 *
 * The template for displaying the custom gutenberg block named Jump Link.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package AJNodes
 * @since 1.0.0
 */

AJNodes::block(
	$block,
	function ( $ajn_block_id, $ajn_block_name,$ajn_block_fields, $ajn_option_fields ) {

		// Block variables.
		$ajn_blkjmplctn_hashid = $ajn_block_fields['ajn_blkjmplctn_hashid'] ?? '';

		echo html_entity_decode( '<div class="theme-jumplink" id="' . $ajn_blkjmplctn_hashid . '"></div>' );

	}
);

