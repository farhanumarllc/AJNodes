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

		// Block variable.
		$ajn_var_sagu_title = $ajn_block_fields['ajn_var_sagu_title'] ?? null;
		$ajn_var_sagu_tabs  = $ajn_block_fields['ajn_var_sagu_tabs'] ?? null;
		?>
		<div class="staff-tabs">
			<?php if(AJNodes::is_block_title($ajn_var_sagu_title)){
				AJNodes::the_block_title($ajn_var_sagu_title,"heading-2");

			} ?>
			<div class="staff-tab" id="staff-tabs">
				<div class="list-wrap">
					<?php
					if ( $ajn_var_sagu_tabs ) {
						foreach( $ajn_var_sagu_tabs as $ajn_key =>  $ajn_var_sagu_tab ){
							$ajn_var_tab_headline  = $ajn_var_sagu_tab['tab_headline'] ?? null;
							$ajn_var_image  = $ajn_var_sagu_tab['image'] ?? null;
							?>
							<div id="<?php echo esc_html(sanitize_title($ajn_var_tab_headline)); ?>" <?php echo ($ajn_key>0)?"style=display:none":""; ?>>
								<?php if($ajn_var_image){ ?>
								<div class="staff-image">
									<?php AJNodes::the_attachment_image($ajn_var_image,900) ?>
								</div>
								<?php } ?>
							</div>
							<?php
						}
					}
					?>
				</div>
				<div class="staff-nav">
					<ul class="nav">
						<?php
						if ( $ajn_var_sagu_tabs ) {
							foreach( $ajn_var_sagu_tabs as $ajn_key =>  $ajn_var_sagu_tab ){
								$ajn_var_tab_headline  = $ajn_var_sagu_tab['tab_headline'] ?? null;
								?>
									<li class="nav-one"><a href="#<?php echo esc_html(sanitize_title($ajn_var_tab_headline)); ?>" class="<?php echo($ajn_key==0)?"current":"" ?>"><?php echo esc_html($ajn_var_tab_headline); ?></a></li>
								<?php
							}
						}

						?>
				</div>
			</div>
		</div>
		<?php
	}
);

