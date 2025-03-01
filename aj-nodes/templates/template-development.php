<?php
/**
 * Template Name: Development
 * Template Post Type: page
 *
 * This template is for displaying home page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package AJNodes
 * @since 1.0.0
 */

// Include header.
get_header();
list( $ajn_var_post_id, $ajn_fields, $ajn_option_fields ) = AJNodes::defaults();

$ajn_var_tmp_dev_title = $ajn_fields['ajn_var_tmp_dev_title'] ?? get_the_title( $ajn_var_post_id );
$ajn_var_tmp_dev_text  = $ajn_fields['ajn_var_tmp_dev_text'] ?? null;
?>
<section id="hero-section" class="hero-section hero-development">
	<div class="wrapper">
		<div class="hero-dev-inner d-flex align-items-center justify-content-between">
			<div class="hero-dev-text">
				<h1 class="heading-1"><?php echo html_entity_decode( $ajn_var_tmp_dev_title ); ?></h1>
				<?php if ( $ajn_var_tmp_dev_text ) { ?>
				<div class="hero-text-inner">
					<?php echo html_entity_decode( $ajn_var_tmp_dev_text ); ?>
				</div>
				<?php } ?>
			</div>
			<?php if ( has_post_thumbnail( $ajn_var_post_id ) ) { ?>
			<div class="hero-dev-image">
				<?php AJNodes::the_featured_image( $ajn_var_post_id, 800 ); ?>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<section id="" class="page-section">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			// Include specific template for the content.
			get_template_part( 'partials/content', 'page' );

		}
	}
	?>
</section>
<div class="gl-s160"></div>

<?php get_footer(); ?>
