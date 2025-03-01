<?php
/**
 * Template Name: Blog
 * Template Post Type: page
 *
 * This template is for displaying blog page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package AJNodes
 * @since 1.0.0
 */

// Include header.
get_header();

list( $ajn_var_post_id, $ajn_fields, $ajn_option_fields ) = AJNodes::defaults();

$ajn_var_pagetitle           = $ajn_fields['ajn_var_tblgho_title'] ?? get_the_title( $ajn_var_post_id );
$ajn_var_tblgho_feature_post = $ajn_fields['ajn_var_tblgho_feature_post'] ?? null;
$ajn_var_author_avatar       = $ajn_fields['ajn_var_author_avatar'] ?? null;

$ajn_var_post_catagories = get_categories( $ajn_var_post_id );

?>
<div class="loader-container" style="display:none;">
	<div class="row">
	  <div class="col-sm-6 text-center">
		<div class="loader4"></div>
	  </div>
	</div>
</div>
<section id="hero-section" class="hero-section hero-home hero-resource">
	<div class="hero-home-inner">
		<div class="wrapper">
			<div class="home-hero-text">
				<?php if ( $ajn_var_pagetitle ) { ?>
				<h1 class="heading"><span><?php echo html_entity_decode( $ajn_var_pagetitle ); ?></span></h1>
				<?php } ?>
				<div class="resource-search-form">
					<form role="search" method="get" id="" action="#">
						<input type="text" name="s" id="ajax-search-value" placeholder="Search Resources...">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="" class="page-section">
	<div class="gl-s72"></div>
	<section>
		<div class="wrapper">

			<div class="post-archive three-columns ajax-search-container">
				<?php
				$ajn_args = array(
					'post_type'      => array( 'post' ),
					'posts_per_page' => 10,
					// 'posts_per_page' => get_option( 'posts_per_page' ),
					'paged'          => ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ),

				);
				$ajn_query = new WP_Query( $ajn_args );
				if ( $ajn_query->have_posts() ) {
					while ( $ajn_query->have_posts() ) {
						$ajn_query->the_post();
						get_template_part( 'partials/content', 'archive-post' );
					}
				} else {
					get_template_part( 'partials/content', 'none' );
				}
				?>
			</div>
			<div class="gl-s72"></div>
			<div class="ajax-search-pagination">
			<?php
			if ( have_posts() ) {
				if ( class_exists( 'AJNodes' ) && $ajn_query->max_num_pages > 1 ) {
					?>
					<div class="center-align">
						<a href="<?php echo esc_html( $ajn_query->max_num_pages ); ?>" class="wp-block-button__link wp-element-button" id="ajax-loadmore-click"><?php esc_html_e( 'Load More', 'AJNodes_td' ); ?></a>
					</div>
					<?php
				}
			}
			?>
			</div>
		</div>
	</section>
</section>
<div class="gl-s160"></div>
<?php
get_footer();
