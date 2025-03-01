<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AJNodes
 * @since 1.0.0
 */

// Include header.
get_header();


list( $ajn_var_post_id, $ajn_fields, $ajn_option_fields ) = AJNodes::defaults();

$ajn_var_tmp_def_title  = $ajn_fields['ajn_var_tmp_def_title'] ?? get_the_title();
$ajn_var_tmp_def_text   = $ajn_fields['ajn_var_tmp_def_text'] ?? null;
$ajn_var_tmp_rsb_button = $ajn_fields['ajn_var_tmp_rsb_button'] ?? null;
?>

<section id="hero-section" class="hero-section hero-home hero-resource-detail">
	<div class="hero-home-inner ctn-840">
		<div class="wrapper">
			<div class="home-hero-text">
				<div class="post-box-meta d-flex justify-content-between">
					<div class="ac-post-cat">
					</div>
				</div>
				<h1 class="heading"><span><?php echo esc_html( $ajn_var_tmp_def_title ); ?></span></h1>
			</div>
			<?php if ( has_post_thumbnail( $ajn_var_post_id ) ) { ?>
			<div class="hero-resource-image">
				<?php AJNodes::the_featured_image( $ajn_var_post_id, 800 ); ?>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<section id="page-section" class="page-section">
	<!-- Content Start -->
	<?php
		global $wp_query;
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			// Include specific template for the content.
			get_template_part( 'partials/content', 'page' );
		}
		?>
		<?php
	} else {
		// If no content, include the "No posts found" template.
		get_template_part( 'partials/content', 'none' );
	}
	?>
	<!-- Content End -->
</section>
<?php get_footer(); ?>
