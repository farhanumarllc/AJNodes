<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AJNodes
 * @since 1.0.0
 */

list( $ajn_var_post_id, $ajn_fields, $ajn_option_fields, $ajn_queried_object ) = AJNodes::defaults();

// Post Tags & Categories.


$ajn_var_service_title = $ajn_post_fields['ajn_var_service_ttitle'] ?? get_the_title( $ajn_var_post_id );
$ajn_var_service_text = $ajn_post_fields['ajn_var_service_text'] ?? get_the_excerpt($ajn_var_post_id);

?>
<section id="hero-section" class="hero-section hero-development">
	<div class="wrapper">
		<div class="hero-dev-inner d-flex align-items-center justify-content-between">
			<div class="hero-dev-text">
				<h1 class="heading-1"><?php echo html_entity_decode( $ajn_var_service_title ); ?></h1>
				<?php if ( $ajn_var_service_text ) { ?>
				<div class="hero-text-inner">
					<?php echo html_entity_decode( $ajn_var_service_text ); ?>
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
	<div class="gl-s72"></div>
	<section>

			<?php get_template_part( 'partials/content' ); ?>
		
	</section>
<div class="gl-s160"></div>
</section>
