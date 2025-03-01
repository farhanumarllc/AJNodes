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
		$ajn_var_op_title = $ajn_block_fields['ajn_var_op_title'] ?? null;
		$ajn_var_op_text = $ajn_block_fields['ajn_var_op_text'] ?? null;
		$ajn_var_op_btn = $ajn_block_fields['ajn_var_op_btn'] ?? null;
		$ajn_var_op_projects = $ajn_block_fields['ajn_var_op_projects'] ?? null;
		?>

						<div class="projects-section">
							<div class="scrolling-head">
								<?php if(AJNodes::is_block_title($ajn_var_op_title)){ ?>
								<div class="scrolling-left">
									<?php AJNodes::the_block_title($ajn_var_op_title,"heading-2");  ?>
								</div>
								<?php } ?>
								<div class="scrolling-right">
									<?php if($ajn_var_op_text){
										echo html_entity_decode($ajn_var_op_text);
									} ?>
									<?php if($ajn_var_op_btn){
										 echo AJNodes::animated_button($ajn_var_op_btn, "ajn-button arrow-btn");
									} ?>
								</div>
							</div>
							<div class="gl-s120"></div>
							<div class="project-cards">
								<?php
								if ( $ajn_var_op_projects ) {
								?>
										<?php
											foreach( $ajn_var_op_projects as $key =>  $ajn_var_op_project ){
												list( $ajn_var_post_id, $ajn_fields, $ajn_option_fields ) = AJNodes::defaults( $ajn_var_op_project );
												?>
												<div class="project-card">
													<a href="<?php echo esc_url(get_the_permalink($ajn_var_op_project)); ?>">
														<?php if(has_post_thumbnail($ajn_var_post_id)){ ?>
														<div class="project-card-image">
															<?php AJNodes::the_featured_image($ajn_var_post_id,400); ?>
														</div>
														<?php } ?>
														<div class="project-detail">
															<div class="project-logo">
																<img src="../assets/src/images/uploads/logo-1.png" alt="">
															</div>
															<div class="hovered-text">
																<div class="project-year"><?php echo get_the_title($ajn_var_post_id); ?></div>
																<div class="project-description"><?php echo esc_html(get_the_excerpt($ajn_var_op_project)); ?></div>
															</div>
														</div>
													</a>
												</div>
												<?php
											}
										?>
								<?php
								}
								?>

							</div>
							<div class="gl-s96"></div>
							<div class="project-button center-align">
								<?php if($ajn_var_op_btn){
										 echo AJNodes::animated_button($ajn_var_op_btn, "ajn-button arrow-btn");
								} ?>
							</div>
						</div>

	<?php }
);

