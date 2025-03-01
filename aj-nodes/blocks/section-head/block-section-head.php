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
		$ajn_var_sh_title = $ajn_block_fields['ajn_var_sh_title'] ?? null;
		$ajn_var_sh_text  = $ajn_block_fields['ajn_var_sh_text'] ?? null;
		?>
			<div class="lead-content">
				<?php
				if(AJNodes::is_block_title($ajn_var_sh_title)){
					AJNodes::the_block_title($ajn_var_sh_title,"heading-2");
				}
				if($ajn_var_sh_text){
					echo html_entity_decode($ajn_var_sh_text);
				}
				?>
			</div>

		<?php
	}
);

