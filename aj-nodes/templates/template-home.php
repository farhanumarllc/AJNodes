<?php
/**
 * Template Name: Home
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

// Calling ACF Template Home Variables.

$ajn_var_tmp_home_title = $ajn_fields['ajn_var_tmp_home_title'] ?? get_the_title( $ajn_var_post_id );
$ajn_var_tmp_home_text  = $ajn_fields['ajn_var_tmp_home_text'] ?? null;
$ajn_var_tmp_sbbtn      = $ajn_fields['ajn_var_tmp_sbbtn'] ?? null;

?>
<section id="hero-section" class="hero-section hero-home">
	<!-- hero start -->
	<div class="hero-home-inner">
		<div class="wrapper">
			<div class="home-hero-text">
				<h1 class="heading"><?php echo html_entity_decode( $ajn_var_tmp_home_title ); ?></h1>
				<?php if ( $ajn_var_tmp_home_text ) { ?>
				<div class="home-text-inner">
					<?php echo html_entity_decode( $ajn_var_tmp_home_text ); ?>
				</div>
				<?php } ?>
			</div>
			<?php if ( has_post_thumbnail( $ajn_var_post_id ) ) { ?>
			<div class="hero-home-image">
				<?php AJNodes::the_featured_image( $ajn_var_post_id, 2000 ); ?>
			</div>
			<?php } ?>
		</div>
	</div>
	<!-- hero end -->
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
<div class="gl-s160"></div>
</section>
<?php get_footer(); ?>
