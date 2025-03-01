<?php
/**
 * Block Name: Text Slider
 *
 * The template for displaying the custom gutenberg block named Faq.
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
		$ajn_var_tslide_tiles = $ajn_block_fields['ajn_var_tslide_tiles'] ?? null;
		?>
		<div class="text-slider">
			<?php
			if ( $ajn_var_tslide_tiles ) {
				foreach( $ajn_var_tslide_tiles as $key =>  $ajn_var_tslide_tile ){
					$ajn_var_tslide_text = $ajn_var_tslide_tile['text'] ?? null;
					if($ajn_var_tslide_text ){
					?>
					<div class="text-slide">
						<?php echo html_entity_decode($ajn_var_tslide_text); ?>
					</div>
					<?php
					}
				}
			}
			?>
		</div>
		<?php
	}
);

