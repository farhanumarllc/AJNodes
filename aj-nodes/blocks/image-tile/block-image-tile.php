<?php
/**
 * Block Name: Image Tile
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
		$ajn_var_img_tile_title = $ajn_block_fields['ajn_var_img_tile_title'] ?? null;
		$ajn_var_img_tile_text  = $ajn_block_fields['ajn_var_img_tile_text'] ?? null;
		$ajn_var_img_tile_image  = $ajn_block_fields['ajn_var_img_tile_image'] ?? null;
		?>
		<div class="mpcta-var">
			<?php if($ajn_var_img_tile_image){ ?>
			<div class="mpcta-image">
				<?php AJNodes::the_attachment_image($ajn_var_img_tile_image,1200); ?>
			</div>
			<?php } ?>
			<div class="mpcta-content center-align">
				<?php if(AJNodes::is_block_title($ajn_var_img_tile_title)){
						AJNodes::the_block_title($ajn_var_img_tile_title,"heading-2");
				}
				if($ajn_var_img_tile_text){
					echo html_entity_decode($ajn_var_img_tile_text);
				}
				?>
			</div>
		</div>
		<?php
	}
);

