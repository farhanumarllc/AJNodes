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
		$ajn_var_faq_title = $ajn_block_fields['ajn_var_faq_title'] ?? null;
		$ajn_var_faq_faqs  = $ajn_block_fields['ajn_var_faq_faqs'] ?? null;
		?>
		<div class="faq-block">
			<?php if ( AJNodes::is_block_title( $ajn_var_faq_title ) ) { ?>
			<div class="faq-head">
				<?php AJNodes::the_block_title( $ajn_var_faq_title ); ?>
			</div>
			<?php } ?>
			<?php
			if ( $ajn_var_faq_faqs ) {
				?>
				<div class="gl-s120"></div>
				<div class="faqs">
					<?php
					foreach ( $ajn_var_faq_faqs as $ajn_var_faq_faq ) {
						$ajn_var_faq_faq_question = $ajn_var_faq_faq['question'] ?? null;
						$ajn_var_faq_faq_answer   = $ajn_var_faq_faq['answer'] ?? null;
						?>
							<div class="single-faq">
							<?php if ( $ajn_var_faq_faq_question ) { ?>
								<div class="single-faq-head">
									<?php echo esc_html( $ajn_var_faq_faq_question ); ?>
								</div>
								<?php } ?>
							<?php if ( $ajn_var_faq_faq_answer ) { ?>
								<div class="faq-content">
									<?php echo html_entity_decode( $ajn_var_faq_faq_answer ); ?>
								</div>
								<?php } ?>
							</div>
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

