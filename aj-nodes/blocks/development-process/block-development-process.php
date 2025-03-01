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
		$ajn_var_dev_process_title = $ajn_block_fields['ajn_var_dev_process_title'] ?? null;
		$ajn_var_dev_process_sp  = $ajn_block_fields['ajn_var_dev_process_sp'] ?? null;
		$ajn_var_dev_process_tiles  = $ajn_block_fields['ajn_var_dev_process_tiles'] ?? null;
		?>
			<div class="work-process">
				<div class="work-process-row">
					<?php
					if ( $ajn_var_dev_process_tiles ) {
						foreach( $ajn_var_dev_process_tiles as $ajn_key =>  $ajn_var_dev_process_tile ){
							$ajn_var_dev_headline = $ajn_var_dev_process_tile['headline'] ?? null;
							$ajn_var_dev_text = $ajn_var_dev_process_tile['text'] ?? null;
							$ajn_var_dev_image = $ajn_var_dev_process_tile['image'] ?? null;
							$ajn_var_dev_link = $ajn_var_dev_process_tile['link'] ?? null;
							?>
							<?php if($ajn_key <= 1){ ?>
							<div class="work-process-tile">
								<a href="<?php echo(isset($ajn_var_dev_link['url']))?$ajn_var_dev_link['url']:"" ?>">
									<?php if($ajn_var_dev_image){ ?>
									<div class="services-image">
										<?php AJNodes::the_attachment_image($ajn_var_dev_image,900); ?>
									</div>
									<?php } ?>
									<div class="work-process-tile-inner">
										<?php if($ajn_var_dev_headline){ ?>
										<h3 class="text-52"><?php echo esc_html($ajn_var_dev_headline); ?></h3>
										<?php } if($ajn_var_dev_text){
											echo html_entity_decode($ajn_var_dev_text);
										} ?>
									</div>
								</a>
							</div>
							<?php } ?>
							<?php
						}
							}
					?>
				</div>
				<div class="work-process-row">
					<?php
					if ( $ajn_var_dev_process_tiles ) {
						foreach( $ajn_var_dev_process_tiles as $ajn_key =>  $ajn_var_dev_process_tile ){
							$ajn_var_dev_headline = $ajn_var_dev_process_tile['headline'] ?? null;
							$ajn_var_dev_text = $ajn_var_dev_process_tile['text'] ?? null;
							$ajn_var_dev_image = $ajn_var_dev_process_tile['image'] ?? null;
							$ajn_var_dev_link = $ajn_var_dev_process_tile['link'] ?? null;
							?>
							<?php if($ajn_key == 2){ ?>
							<div class="work-process-tile">
								<a href="<?php echo(isset($ajn_var_dev_link['url']))?$ajn_var_dev_link['url']:"" ?>">
									<?php if($ajn_var_dev_image){ ?>
									<div class="services-image">
										<?php AJNodes::the_attachment_image($ajn_var_dev_image,900); ?>
									</div>
									<?php } ?>
									<div class="work-process-tile-inner">
										<?php if($ajn_var_dev_headline){ ?>
										<h3 class="text-52"><?php echo esc_html($ajn_var_dev_headline); ?></h3>
										<?php } if($ajn_var_dev_text){
											echo html_entity_decode($ajn_var_dev_text);
										} ?>
									</div>
								</a>
							</div>
							<?php } ?>
							<?php
						}
							}
					?>
				</div>
				<div class="work-process-row">
					<?php
					if ( $ajn_var_dev_process_tiles ) {
						foreach( $ajn_var_dev_process_tiles as $ajn_key =>  $ajn_var_dev_process_tile ){
							$ajn_var_dev_headline = $ajn_var_dev_process_tile['headline'] ?? null;
							$ajn_var_dev_text = $ajn_var_dev_process_tile['text'] ?? null;
							$ajn_var_dev_image = $ajn_var_dev_process_tile['image'] ?? null;
							$ajn_var_dev_link = $ajn_var_dev_process_tile['link'] ?? null;
							?>
							<?php if($ajn_key > 2 && $ajn_key <= 5 ){ ?>
							<div class="work-process-tile">
								<a href="<?php echo(isset($ajn_var_dev_link['url']))?$ajn_var_dev_link['url']:"" ?>">
									<?php if($ajn_var_dev_image){ ?>
									<div class="services-image">
										<?php AJNodes::the_attachment_image($ajn_var_dev_image,900); ?>
									</div>
									<?php } ?>
									<div class="work-process-tile-inner">
										<?php if($ajn_var_dev_headline){ ?>
										<h3 class="text-52"><?php echo esc_html($ajn_var_dev_headline); ?></h3>
										<?php } if($ajn_var_dev_text){
											echo html_entity_decode($ajn_var_dev_text);
										} ?>
									</div>
								</a>
							</div>
							<?php } ?>
							<?php
						}
							}
					?>
				</div>
			</div>
		<?php
	}
);

