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
		$ajn_var_our_team_title = $ajn_block_fields['ajn_var_our_team_title'] ?? null;
		$ajn_var_our_team_departs  = $ajn_block_fields['ajn_var_our_team_departs'] ?? null;
		$ajn_var_our_team_members  = $ajn_block_fields['ajn_var_our_team_members'] ?? null;
		?>
			<div class="team-section">
				<div class="team-center">
					<?php if($ajn_var_our_team_title){ ?>
					<div class="team-title"><?php echo esc_html($ajn_var_our_team_title); ?></div>
					<?php } ?>
					<div class="team-departments">
						<?php
						if ( $ajn_var_our_team_departs ) {
									foreach( $ajn_var_our_team_departs as $ajn_key =>  $ajn_var_our_team_depart ){
										$ajn_var_department  = $ajn_var_our_team_depart['department'] ?? null;
										?>
										<div class="team-description"><?php echo esc_html($ajn_var_department); ?></div>
										<?php
									}
								}
						?>
					</div>
				</div>
				<div class="team-circle">
					<?php
					if ( $ajn_var_our_team_members ) {
						foreach( $ajn_var_our_team_members as $key =>  $ajn_var_our_team_member ){
							$ajn_var_image_id  = $ajn_var_our_team_member['image'] ?? null;
							$ajn_var_name  = $ajn_var_our_team_member['name'] ?? null;
							$ajn_var_designation  = $ajn_var_our_team_member['designation'] ?? null;

							?>
							<div class="team-member">
								<?php if($ajn_var_image_id){ ?>
								<div class="team-member-image">
									<?php AJNodes::the_attachment_image($ajn_var_image_id,900); ?>
								</div>
								<?php }
								if($ajn_var_name || $ajn_var_designation ){
								?>
								<div class="role-label">
									<?php echo esc_html($ajn_var_name ); ?>
									<?php if($ajn_var_designation){ ?>
									<span><?php echo esc_html($ajn_var_designation) ?></span>
									<?php } ?>
								</div>
								<?php } ?>
							</div>
							<?php
						}

					} ?>
				</div>
			</div>
		<?php
	}
);

