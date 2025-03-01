<?php
/**
 * Block Name: BlockName
 *
 * The template for displaying the custom gutenberg block named BlockName.
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
		$ajn_var_blkacf_title        = $ajn_block_fields['ajn_var_blkacf_title'] ?? null;
		$ajn_var_blkacf_spcr         = $ajn_block_fields['ajn_var_blkacf_spcr'] ?? null;
		$ajn_var_blkacf_image        = $ajn_block_fields['ajn_var_blkacf_image'] ?? null;
		$ajn_var_blkacf_text         = $ajn_block_fields['ajn_var_blkacf_text'] ?? null;
		$ajn_var_blkacf_btn          = $ajn_block_fields['ajn_var_blkacf_btn'] ?? null;
		$ajn_var_blkacf_advance_form = $ajn_block_fields['ajn_var_blkacf_advance_form'] ?? null;
		$ajn_var_blkacf_video        = $ajn_block_fields['ajn_var_blkacf_video'] ?? null;
		var_dump( $ajn_var_blkacf_image );
		?>


		<?php AJNodes::the_attachment_image( $ajn_var_blkacf_image ); ?>

<div class="recent-posts">
				<h2><span>Recent Posts</span></h2>
				<div class="post-archive three-columns">
					<article class="post-box column">
						<div class="post-box-img post-image">
							<a href="#"> <img src="../assets/src/images/uploads/default-image.png">
							</a>
						</div>
						<div class="post-content">
							<div class="post-box-meta d-flex justify-content-between">
								<div class="post-date">January 7, 2012</div>
								<div class="ac-post-cat">
									<a href="http://AJNodesdevcause.local/category/cat-a/">Cat A</a>
								</div>
							</div>
							<div class="post-box-title post-title">
								<h4> <a href="#">Block category: Layout Elements</a> </h4>
							</div>
							<div class="post-box-excerpt">
								<p>Studies show that I’m not alone in needing others to help me through cancer.
								</p>
							</div>
							<a href="#" class="ajn-button arrow-btn"><span>Read More</span></a>
						</div>
					</article>
					<article class="post-box column">
						<div class="post-box-img post-image">
							<a href="#"> <img src="../assets/src/images/uploads/default-image.png">
							</a>
						</div>
						<div class="post-content">
							<div class="post-box-meta d-flex justify-content-between">
								<div class="post-date">January 7, 2012</div>
								<div class="ac-post-cat">
									<a href="http://AJNodesdevcause.local/category/cat-a/">Cat A</a>
								</div>
							</div>
							<div class="post-box-title post-title">
								<h4> <a href="#">Block category: Layout Elements</a> </h4>
							</div>
							<div class="post-box-excerpt">
								<p>Studies show that I’m not alone in needing others to help me through cancer.
								</p>
							</div>
							<a href="#" class="ajn-button arrow-btn"><span>Read More</span></a>
						</div>
					</article>
					<article class="post-box column">
						<div class="post-box-img post-image">
							<a href="#"> <img src="../assets/src/images/uploads/default-image.png">
							</a>
						</div>
						<div class="post-content">
							<div class="post-box-meta d-flex justify-content-between">
								<div class="post-date">January 7, 2012</div>
								<div class="ac-post-cat">
									<a href="http://AJNodesdevcause.local/category/cat-a/">Cat A</a>
								</div>
							</div>
							<div class="post-box-title post-title">
								<h4> <a href="#">Block category: Layout Elements</a> </h4>
							</div>
							<div class="post-box-excerpt">
								<p>Studies show that I’m not alone in needing others to help me through cancer.
								</p>
							</div>
							<a href="#" class="ajn-button arrow-btn"><span>Read More</span></a>
						</div>
					</article>
				</div>
			</div>

		<?php

	}
);

