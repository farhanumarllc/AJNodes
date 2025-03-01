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
		$ajn_var_os_title    = $ajn_block_fields['ajn_var_os_title'] ?? null;
		$ajn_var_os_text     = $ajn_block_fields['ajn_var_os_text'] ?? null;
		$ajn_var_os_services = $ajn_block_fields['ajn_var_os_services'] ?? null;
		?>
		<div class="scrolling-section">
			<div class="scrolling-head">
				<?php if ( AJNodes::is_block_title( $ajn_var_os_title ) ) { ?>
				<div class="scrolling-left with-icon">
					<?php AJNodes::the_block_title( $ajn_var_os_title,"heading-2" ); ?>
				</div>
					<?php
				}
				if ( $ajn_var_os_text ) {
					?>
				<div class="scrolling-right">
					<?php echo html_entity_decode( $ajn_var_os_text ); ?>
				</div>
				<?php } ?>
			</div>

				<?php
				if ( $ajn_var_os_services ) {
					?>
					<div class="gl-s120"></div>
					<div class="scrolling-cards">
						<?php
						foreach ( $ajn_var_os_services as $key => $ajn_var_os_service ) {
							list( $ajn_var_post_id, $ajn_fields, $ajn_option_fields ) = AJNodes::defaults( $ajn_var_os_service );
							?>
							<?php
							if ($key % 2 == 0) {
								if ($key > 0) {
									echo '</div>'; // Close previous row
								}
								echo '<div class="scrolling-cards-row two-columns">';
							}

							?>
										<div class="scrolling-single-tile">
											<a href="<?php echo esc_url( get_the_permalink( $ajn_var_post_id ) ); ?>">
												<?php if ( has_post_thumbnail( $ajn_var_post_id ) ) { ?>
												<div class="services-image">
													<?php AJNodes::the_featured_image( $ajn_var_post_id, 600 ); ?>
												</div>
												<?php } ?>
												<div class="scrolling-single-tile-inner">
													<h3 class="text-32"><?php echo get_the_title( $ajn_var_post_id ); ?></h3>
														<p><?php echo get_the_excerpt( $ajn_var_post_id ); ?></p>
												</div>
												<span class="services-bottom d-flex align-items-center">
													<span
														class="services-count d-flex align-items-center justify-content-center">150</span>
													<span class="services-text">Websites Completed</span>
												</span>
											</a>
										</div>
									<?php
								}
								if ($key % 2 != 0) {
 								echo '</div>';
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

