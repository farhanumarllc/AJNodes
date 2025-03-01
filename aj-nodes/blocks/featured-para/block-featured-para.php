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
		$ajn_var_fpra_title = $ajn_block_fields['ajn_var_fpra_title'] ?? '';
		$ajn_var_fpra_dvar  = $ajn_block_fields['ajn_var_fpra_dvar'] ?? '';
		$ajn_var_fpra_text  = $ajn_block_fields['ajn_var_fpra_text'] ?? '';
		$ajn_var_fpra_btn   = $ajn_block_fields['ajn_var_fpra_btn'] ?? '';

		?>

		<?php if ( $ajn_var_fpra_dvar == 'design-one' ) { ?>
		<div class="title-with-text">
			<div class="twt-left">
				<?php if ( AJNodes::is_block_title( $ajn_var_fpra_title ) ) { ?>
				<div class="twt-title">
					<?php AJNodes::the_block_title( $ajn_var_fpra_title ); ?>
				</div>
					<?php
				}
				if ( $ajn_var_fpra_btn ) {
					?>
				<div class="twt-button">
					<?php echo AJNodes::animated_button( $ajn_var_fpra_btn, 'ajn-button arrow-btn' ); ?>
				</div>
					<?php
				}
				?>
			</div>
			<?php if ( $ajn_var_fpra_text ) { ?>
			<div class="twt-right">
				<?php echo html_entity_decode( $ajn_var_fpra_text ); ?>
			</div>
			<?php } ?>
		</div>
		<?php } else if( $ajn_var_fpra_dvar == 'design-two'){ ?>
			<div class="title-with-text variation">
				<div class="twt-left">
					<?php if ( AJNodes::is_block_title( $ajn_var_fpra_title ) ) { ?>
					<div class="twt-title">
						<?php AJNodes::the_block_title( $ajn_var_fpra_title ); ?>
					</div>
						<?php
					}
					if ( $ajn_var_fpra_btn ) {
						?>
					<div class="twt-button">
						<?php echo AJNodes::animated_button( $ajn_var_fpra_btn, 'ajn-button arrow-btn' ); ?>
					</div>
					<?php } ?>
				</div>
				<?php if ( $ajn_var_fpra_text ) { ?>
					<div class="twt-right">
						<?php echo html_entity_decode( $ajn_var_fpra_text ); ?>
					</div>
				<?php } ?>
			</div>
		<?php } else { ?>
			<div class="featured-content">
				<?php if ( AJNodes::is_block_title( $ajn_var_fpra_title ) ) { ?>
				<div class="featured-content-head">
					<?php AJNodes::the_block_title( $ajn_var_fpra_title ); ?>
				</div>
					<?php
					}
				if($ajn_var_fpra_text){
					echo html_entity_decode( $ajn_var_fpra_text );
				}  ?>
			</div>


		<?php
		}
	}
);

