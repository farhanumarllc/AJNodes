<?php
/**
 * Block Name: Faq
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
		$ajn_var_mpc_title = $ajn_block_fields['ajn_var_mpc_title'] ?? null;
		$ajn_var_mpc_text  = $ajn_block_fields['ajn_var_mpc_text'] ?? null;
		$ajn_var_mpc_btn  = $ajn_block_fields['ajn_var_mpc_btn'] ?? null;
		$ajn_var_mpc_icon  = $ajn_block_fields['ajn_var_mpc_icon'] ?? null;
		$ajn_var_mpc_image  = $ajn_block_fields['ajn_var_mpc_image'] ?? null;
		?>
		<div class="midpage-cta d-flex align-items-center justify-content-between">
			<div class="mpcta-content">
				<div class="mpcta-content-inner">
					<?php
					if(AJNodes::is_block_title($ajn_var_mpc_title)){
					AJNodes::the_block_title($ajn_var_mpc_title,"heading-2");
					}
					if($ajn_var_mpc_text){
						echo html_entity_decode($ajn_var_mpc_text);
					}
					?>
				</div>
					<?php
					if($ajn_var_mpc_btn){
						echo AJNodes::animated_button($ajn_var_mpc_btn,"ajn-button arrow-btn");
					}
					?>
			</div>
			<div class="mpcta-image">
				<?php if($ajn_var_mpc_image){
					AJNodes::the_attachment_image($ajn_var_mpc_image,200);
				}?>
				<?php if($ajn_var_mpc_icon ) { ?>
				<div class="mpcta-icon">
					<?php AJNodes::the_attachment_image($ajn_var_mpc_icon,900);  ?>
				</div>
				<?php } ?>
			</div>
		</div>

		<?php
	}
);

