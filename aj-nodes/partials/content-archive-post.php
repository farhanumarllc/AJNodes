<?php
/**
 * Template part for displaying posts in an archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AJNodes
 * @since 1.0.0
 */

if ( isset( $args['ajn_var_archieve_post_id'] ) ) {
	list( $ajn_var_post_id, $ajn_fields, $ajn_option_fields ) = AJNodes::defaults( $args['ajn_var_archieve_post_id'] );
} else {
	list( $ajn_var_post_id, $ajn_fields, $ajn_option_fields ) = AJNodes::defaults();
}

$ajn_var_categories       = get_the_category( $ajn_var_post_id );
$ajn_var_categories_links = array();
foreach ( $ajn_var_categories as $ajn_var_categories ) {
	$ajn_var_category_link     = get_category_link( $ajn_var_categories->term_id );
	$ajn_var_categories_links[] = '<a href="' . esc_url( $ajn_var_category_link ) . '">' . esc_html( $ajn_var_categories->name ) . '</a>';
}
?>
<article class="post-box column">
	<?php if ( has_post_thumbnail( $ajn_var_post_id ) ) { ?>
	<div class="post-box-img post-image">
		<a href="<?php echo esc_url( get_the_permalink( $ajn_var_post_id ) ); ?>">
			<?php AJNodes::the_featured_image( $ajn_var_post_id, 600 ); ?>
		</a>
	</div>
	<?php } ?>
	<div class="post-content">
		<div class="post-box-meta d-flex justify-content-between">
			<div class="post-date"><?php echo get_the_date( 'F j, Y', $ajn_var_post_id ); ?></div>
			<?php if ( $ajn_var_categories_links ) { ?>
			<div class="ac-post-cat">
				<?php echo html_entity_decode( implode( ', ', $ajn_var_categories_links ) ); ?>
			</div>
			<?php } ?>
		</div>
		<div class="post-box-title post-title">
			<h4> <a href="<?php echo esc_url( get_the_permalink( $ajn_var_post_id ) ); ?>"><?php echo esc_html( get_the_title( $ajn_var_post_id ) ); ?></a> </h4>
		</div>
		<div class="post-box-excerpt">
			<p><?php echo esc_html( get_the_excerpt( $ajn_var_post_id ) ); ?></p>
		</div>
		<a href="<?php echo esc_url( get_the_permalink( $ajn_var_post_id ) ); ?>" class="ajn-button arrow-btn"><span><?php esc_html_e( 'Read More', 'AJNodes_td' ); ?></span></a>
	</div>
</article>
