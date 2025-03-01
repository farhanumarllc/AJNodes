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
		$ajn_var_hwk_title = $ajn_block_fields['ajn_var_hwk_title'] ?? null;
		$ajn_var_hwk_text = $ajn_block_fields['ajn_var_hwk_text'] ?? null;
		$ajn_var_hwk_slides = $ajn_block_fields['ajn_var_hwk_slides'] ?? null;

		?>
					<div class="our-work">
						<div class="our-work-head">
							<?php if( AJNodes::is_block_title($ajn_var_hwk_title) ){
								AJNodes::the_block_title($ajn_var_hwk_title);
							}
							if($ajn_var_hwk_text){
								echo html_entity_decode($ajn_var_hwk_text);
							} ?>
						</div>
						<div class="gl-s72"></div>
						<div class="swiper mySwiper workSlider">
							<div class="swiper-wrapper">
								<?php if ( $ajn_var_hwk_slides ) {
									$loop_key = 1;
								?>
									<?php
										foreach( $ajn_var_hwk_slides as $key =>  $ajn_var_hwk_slides ){
											$ajn_var_hwk_headline = $ajn_var_hwk_slides['headline'] ?? null;
											$ajn_var_hwk_text = $ajn_var_hwk_slides['text'] ?? null;
											?>
												<div class="swiper-slide">
													<div class="work-slide">
														<?php if($ajn_var_hwk_headline){ ?>
														<div class="work-title">
															<?php echo esc_html($ajn_var_hwk_headline); ?>
														</div>
														<?php } ?>
														<?php if($ajn_var_hwk_text){
														echo html_entity_decode($ajn_var_hwk_text);
														} ?>
													</div>
													<div class="work-step">Step <?php echo esc_html($loop_key); ?></div>
												</div>
											<?php
											$loop_key++;
										}
									?>
								<?php
								} ?>


							</div>
						</div>
					</div>



	<?php }
);

