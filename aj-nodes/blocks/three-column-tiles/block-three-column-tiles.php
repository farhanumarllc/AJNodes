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
	function ( $ajn_block_id, $ajn_block_name, $ajn_block_fields, $ajn_option_fields ) {

		// Block variables.
		$ajn_var_three_col_tiles = $ajn_block_fields['ajn_var_three_col_tiles'] ?? '';

		?>
		<?php
		if ( $ajn_var_three_col_tiles ) {
			?>
			<div class="text-columns">
				<?php
				foreach ( $ajn_var_three_col_tiles as $key => $ajn_var_three_col_tile ) {
					$ajn_var_three_col_tile_headline = $ajn_var_three_col_tile['headline'] ?? '';
					$ajn_var_three_col_tile_text     = $ajn_var_three_col_tile['text'] ?? '';
					?>
						<div class="single-text-column">
						<?php if ( $ajn_var_three_col_tile_headline ) { ?>
							<h2 class="heading-4"><?php echo html_entity_decode( $ajn_var_three_col_tile_headline ); ?></h2>
							<?php
						}
						if ( $ajn_var_three_col_tile_text ) {
							echo html_entity_decode( $ajn_var_three_col_tile_text );
						}
						?>
						</div>
						<?php
				}
				?>
			</div>
			<?php
		}

		?>
		<?php
	}
);

