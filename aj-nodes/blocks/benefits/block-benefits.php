<?php
/**
 * Block Name: Benefits
 *
 * The template for displaying the custom gutenberg block named benefits.
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
		$ajn_var_befits_title = $ajn_block_fields['ajn_var_befits_title'] ?? null;
		$ajn_var_befits_hover_tabs  = $ajn_block_fields['ajn_var_befits_hover_tabs'] ?? null;
		?>
		<div class="benefits-block">
			<?php if(AJNodes::is_block_title($ajn_var_befits_title)){
				AJNodes::the_block_title($ajn_var_befits_title,"heading-2");
			} ?>
			<div class="benefit-teaser">
				<div class="benefit-images">
					<?php
					if ( $ajn_var_befits_hover_tabs ) {
						foreach( $ajn_var_befits_hover_tabs as $ajn_key =>  $ajn_var_befits_hover_tab ){
							$ajn_var_befits_headline = $ajn_var_befits_hover_tab['headline'] ?? null;
							$ajn_var_befits_image = $ajn_var_befits_hover_tab['image'] ?? null;
							if($ajn_var_befits_image){
							?>
							<div class="benefit-image <?php echo($ajn_key==0)?"active-project":""; ?>" data-id="<?php echo esc_html(sanitize_title($ajn_var_befits_headline )); ?>">
								<?php AJNodes::the_attachment_image($ajn_var_befits_image,"900"); ?>
							</div>

							<?php
							}
						}
					}
					?>
					<svg class="benefits_svg">
						<clipPath id="benefits_svg" clipPathUnits="objectBoundingBox">
							<path
								d="M0.491,0 H0 V0.372 H0.491 V0 M1,0.628 H0.509 V1 H1 V0.628 M0,0.39 H0.491 V0.866 H0 V0.39 M1,0.134 H0.509 V0.61 H1 V0.134">
							</path>
						</clipPath>
					</svg>
				</div>
				<div class="benefit-content">

					<?php
					if ( $ajn_var_befits_hover_tabs ) {
						$ajn_loop_key=1;
						foreach( $ajn_var_befits_hover_tabs as $ajn_key =>  $ajn_var_befits_hover_tab ){
							$ajn_var_befits_headline = $ajn_var_befits_hover_tab['headline'] ?? null;
							$ajn_var_befits_text = $ajn_var_befits_hover_tab['text'] ?? null;
							$ajn_var_befits_image = $ajn_var_befits_hover_tab['image'] ?? null;
							?>
							<div class="single-benefit <?php echo($ajn_key==0)?"active-benefit":""; ?>" id="<?php echo esc_html(sanitize_title($ajn_var_befits_headline )); ?>">
								<div class="benefit-counting">0<?php echo esc_html($ajn_loop_key); ?></div>
								<div class="single-benefit-head <?php echo($ajn_key==0)?"active":""; ?>">
									<?php if($ajn_var_befits_headline){ ?>
									<div class="benefit-title"> <?php echo esc_html($ajn_var_befits_headline); ?> </div>
									<?php } ?>
								</div>
								<?php if($ajn_var_befits_text){ ?>
								<div class="benefit-content">
									<?php echo html_entity_decode($ajn_var_befits_text); ?>
								</div>
								<?php } ?>
							</div>
							<?php
							$ajn_loop_key++;
						}

					}
					?>
				</div>
			</div>
		</div>

		<?php
	}
);

