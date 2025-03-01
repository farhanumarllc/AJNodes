<?php
/**
 * Template part for displaying content of about us page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 *
 * @package AJNodes
 * @since 1.0.0
 */

list($ajn_var_author_avatar,$ajn_var_author_name) = AJNodes::get_author_data( get_the_ID() );

// Post Tags & Categories.
$ajn_var_post_tag = get_the_tags( get_the_ID() );

?>


<div class="post-box-meta d-flex justify-content-between">
	<div class="post-date">
		<?php the_time( AJNodes_PROJECT_DTFORMAT ); ?>
	</div>
	<?php if ( $ajn_var_post_tag ) { ?>
		<div class="ac-post-cat">
		<?php foreach ( $ajn_var_post_tag as $ajn_var_category ) { ?>
			<a href="<?php echo esc_url( get_category_link( $ajn_var_category ) ); ?>"><?php echo esc_html( $ajn_var_category->name ); ?></a>
		<?php } ?>
		</div>
	<?php } ?>
</div>
