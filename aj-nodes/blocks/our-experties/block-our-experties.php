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
		$ajn_var_oexpt_title   = $ajn_block_fields['ajn_var_oexpt_title'] ?? null;
		$ajn_var_oexpt_text    = $ajn_block_fields['ajn_var_oexpt_text'] ?? null;
		$ajn_var_ourexpt_tiles = $ajn_block_fields['ajn_var_ourexpt_tiles'] ?? null;

		?>
			<div class="expertise-block">
				<?php
				if ( AJNodes::is_block_title( $ajn_var_oexpt_title ) ) {
					AJNodes::the_block_title( $ajn_var_oexpt_title );
				}
				?>
				<?php
				if ( $ajn_var_oexpt_text ) {
					echo html_entity_decode( $ajn_var_oexpt_text );

				}
				?>
					<?php
					if ( $ajn_var_ourexpt_tiles ) {
						?>
						<div class="expertise-tags">
							<?php
							foreach ( $ajn_var_ourexpt_tiles as $key => $ajn_var_ourexpt_tile ) {
								$ajn_var_ourexpt_tile_headline = $ajn_var_ourexpt_tile['headline'] ?? null;
								?>
										<span><?php echo esc_html( $ajn_var_ourexpt_tile_headline ); ?></span>
									<?php
							}
							?>
						</div>
						<?php
					}
					?>
			</div>
		<?php
	}
);

