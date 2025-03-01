<?php
/**
 * Block Name: Why Us
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
		$ajn_var_yus_content = $ajn_block_fields['ajn_var_yus_content'] ?? null;
		$ajn_var_yus_content_dvar = $ajn_block_fields['ajn_var_yus_content_dvar'] ?? null;
		$ajn_var_yus_dvar = $ajn_block_fields['ajn_var_yus_dvar'] ?? null;
		?>
		<?php if($ajn_var_yus_dvar =="design-one"){ ?>
		<div class="why-us">
			<?php
			if ( $ajn_var_yus_content ) {
				?>
					<?php
					foreach ( $ajn_var_yus_content as $key => $ajn_var_yus_content_single ) {
							$ajn_var_yus_content_headline = $ajn_var_yus_content_single['headline'] ?? null;
							$ajn_var_yus_content_text     = $ajn_var_yus_content_single['text'] ?? null;
							$ajn_var_yus_content_image    = $ajn_var_yus_content_single['image'] ?? null;
							$ajn_var_yus_content_logo     = $ajn_var_yus_content_single['logo'] ?? null;

						?>
							<div class="why-us-row">
								<div class="why-us-image">
								<?php if ( $ajn_var_yus_content_image ) { ?>
										<?php AJNodes::the_attachment_image( $ajn_var_yus_content_image, 800 ); ?>
									<?php } ?>
								<?php if ( $ajn_var_yus_content_logo ) { ?>
									<div class="why-us-icon">
										<?php AJNodes::the_attachment_image( $ajn_var_yus_content_logo, 200 ); ?>
									</div>
									<?php } ?>
								</div>
								<div class="why-us-content">
								<?php if ( $ajn_var_yus_content_headline ) { ?>
										<h2 class="heading-2"><?php echo html_entity_decode( $ajn_var_yus_content_headline ); ?></h2>
									<?php } ?>
								<?php
								if ( $ajn_var_yus_content_text ) {
									echo html_entity_decode( $ajn_var_yus_content_text );
								}
								?>
								</div>
							</div>
							<?php
					}
					?>
				<?php
			}

			?>
		</div>
		<?php } else if($ajn_var_yus_dvar =="design-two") { ?>
		<div class="why-us why-us-variation">
			<?php
			if ( $ajn_var_yus_content_dvar ) {
			?>
					<?php
						foreach( $ajn_var_yus_content_dvar as $key =>  $ajn_var_yus_content_single ){
							$ajn_var_yus_content_headline = $ajn_var_yus_content_single['headline'] ?? null;
							$ajn_var_yus_content_text     = $ajn_var_yus_content_single['text'] ?? null;
							?>
							<?php
							if ($key % 2 == 0) {
								if ($key > 0) {
									echo '</div>'; // Close previous row
								}
								echo '<div class="why-us-row">';
							}
							?>
							<div class="why-us-box">
								<?php if($key == 1 || $key==3  ){ ?>
								<spanLines></spanLines>
								<spanLines></spanLines>
								<spanLines></spanLines>
								<spanLines></spanLines>
								<?php } ?>

								<div class="box-inner">
									<?php if($ajn_var_yus_content_headline){ ?>
									<div class="box-head">
										<?php echo html_entity_decode($ajn_var_yus_content_headline); ?>
									</div>
									<?php } if($ajn_var_yus_content_text){ ?>
									<div class="box-text">
										<?php echo html_entity_decode($ajn_var_yus_content_text );?>
									</div>
									<?php } ?>
								</div>
							</div>
							<?php
						}
					?>
					</div>
			<?php
			} ?>
		</div>
		<?php } else { ?>
			<?php if ( $ajn_var_yus_content_dvar ) {
			?>
				<div class="floating-items">
					<?php
						foreach( $ajn_var_yus_content_dvar as $key =>  $ajn_var_yus_content_single ){
							$ajn_var_yus_content_headline = $ajn_var_yus_content_single['headline'] ?? null;
							?>
							<div class="floating-item">
								<div class="floating-dot"></div>
								<?php if($ajn_var_yus_content_headline){ ?>
								<div class="floating-text">
									<?php echo html_entity_decode($ajn_var_yus_content_headline); ?>
								</div>
								<?php } ?>
							</div>
							<?php
						}
					?>
				</div>
			<?php
			} ?>

		<?php } ?>
		<?php
	}
);

