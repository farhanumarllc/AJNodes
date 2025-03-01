<?php
/**
 * Template Name: Resources
 * Template Post Type: page
 *
 * This template is for displaying resource page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package AJNodes
 * @since 1.0.0
 */

// Include header.
get_header();

list( $ajn_var_post_id, $ajn_fields, $ajn_option_fields ) = AJNodes::defaults();

$ajn_var_pagetitle          = $ajn_fields['ajn_var_pagetitle'] ?? get_the_title();
$ajn_var_trcho_feature_post = $ajn_fields['ajn_var_trcho_feature_post'] ?? null;

?>


<section id="hero-section" class="hero-section hero-section-default">
	<div class="blog-hero">
		<div class="wrapper">
			<div class="banner-content">
				<h1><?php echo esc_html( $ajn_var_pagetitle ); ?></h1>
			</div>
			<div class="gl-s72"></div>
			<?php
			if ( $ajn_var_trcho_feature_post ) {
				?>
				<?php
				foreach ( $ajn_var_trcho_feature_post as $ajn_var_post_id ) {

					$ajn_var_post_title     = get_the_title( $ajn_var_post_id );
					$ajn_var_post_excerpt   = get_the_excerpt( $ajn_var_post_id );
					$ajn_var_post_date      = get_the_date( 'M d Y', $ajn_var_post_id );
					$ajn_var_post_parmalink = get_the_permalink( $ajn_var_post_id );
					$ajn_var_post_tags      = get_the_tags( $ajn_var_post_id );
					?>

				<div class="resources-post-box featured-post">
					<div class="resources-inner two-columns align-items-center justify-content-between">
						<?php if ( $post_image ) { ?>
							<div class="rc-post-img post-image rs-view-100">
								<a href="<?php echo esc_url( $post_parmalink ); ?>">
									<?php
									if ( ! has_post_thumbnail( $ajn_var_post_id ) ) {
										echo '<img class="" src="' . esc_url( get_template_directory_uri() ) . '/assets/build/images/admin/defaults/default-image.webp" >';
									} else {
										echo get_the_post_thumbnail(
											$ajn_var_post_id,
											'thumb_900',
										);
									}
									?>
								</a>
							</div>
						<?php } ?>
						<div class="post-content rs-view-100">
							<?php if ( $post_title ) { ?>
								<div class="post-box-title">
									<h2><a href="<?php echo esc_url( $post_parmalink ); ?>"><?php echo esc_html( $post_title ); ?></a></h2>
								</div>
							<?php } ?>
							<!-- post excerpt -->
							<?php if ( $post_excerpt ) { ?>
								<div class="post-box-excerpt">
									<p>
										<?php echo esc_html( $post_excerpt ); ?>
									</p>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
					<?php
				}
			}
			?>
		</div>
	</div>
	<!-- Hero End -->
</section>
<section id="page-section" class="page-section">
	<!-- Content Start -->
	<div class="wrapper">
		<?php
			// WP_Query.
			$ajn_query = AJNodes::query(
				array(
					'post_type'     => 'resource',
					'template'      => 'archive-resource',
					'template_none' => 'none',
				)
			);
			?>

		<div class="ts-80"></div>
		<!-- Content End -->
	</div>
</section>

<?php
get_footer();
