<?php
/**
 * Template part for displaying single resource
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AJNodes
 * @since 1.0.0
 */

list( $ajn_var_post_id, $ajn_fields, $ajn_option_fields ) = AJNodes::defaults();
// Post Tags & Categories.
$ajn_var_post_tags       = get_the_tags( $ajn_var_post_id );
$ajn_var_post_categories = get_categories( $ajn_var_post_id );


$ajn_var_post_title = $ajn_fields['ajn_var_post_title'] ?? get_the_title();

?>

<div class="container-980">
	<div class="wrapper">
		<div class="post-image">
			<a href="<?php the_permalink(); ?>">
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
		</div><!-- .post-image -->
		<div class="post-meta d-flex justify-content-between align-items-center">
			<!-- /.post-tags -->
			<?php if ( $ajn_var_post_categories ) { ?>
				<div class="post-cat">
					<?php foreach ( $ajn_var_post_categories as $ajn_var_category ) { ?>
						<a href="<?php echo esc_url( get_category_link( $ajn_var_category ) ); ?>"><?php echo esc_html( $ajn_var_category->name ); ?></a>
					<?php } ?>
				</div>
				<!-- /.post-cat -->
			<?php } ?>
			<div class="post-shares">
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>"
					rel="noopener" rel="noreferrer"
					onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
						src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/facebook-icon.svg" alt="Facebook"
						class="post-fb-share"></a>
				<a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>"
					rel="noopener" rel="noreferrer"
					onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
						src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/linkedin-icon.svg" alt="Linked In"
						class="post-li-share"></a>
				<a href="http://twitter.com/intent/tweet?text=Currently reading <?php the_title(); ?>&amp;url=<?php the_permalink(); ?>"
					rel="noopener" rel="noreferrer"
					onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
						src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/twitter-icon.svg" alt="Twitter"
						class="post-tw-share"></a>
			</div>
			<!-- /.post-shares -->
		</div>


		<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-ctn' ); ?>>
				<?php get_template_part( 'partials/content' ); ?>
				<div class="post-details">
					<div class="post-pagination"> <?php the_posts_pagination(); ?> </div>
					<div class="post-comments">
					<?php
							// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					?>
					</div>
				</div>
				<div class="ts-80"></div>
			</div>

			<?php
			wp_reset_postdata();

			$ajn_var_rp_selection_criteria = isset( $ajn_fields['ajn_var_rp_selection_criteria'] ) ? $ajn_fields['ajn_var_rp_selection_criteria'] : null;
			if ( 'random' === $ajn_var_rp_selection_criteria ) {

				$ajn_args = array(
					'posts_per_page' => 3,
					'post__not_in'   => array( $post->ID ),
					'orderby'        => 'rand',
				);

				$ajn_query = new WP_Query( $ajn_args );

				// The Loop.
				if ( $ajn_query->have_posts() ) {
					while ( $ajn_query->have_posts() ) {
						$ajn_query->the_post();
						get_template_part( 'partials/content', 'archive-post' );
					}
					?>
					<?php
				}
			} else {
				global $post;
				$ajn_var_selected_posts = array();
				$ajn_var_selected_posts = isset( $ajn_fields['ajn_var_rp_selected_posts'] ) ? $ajn_fields['ajn_var_rp_selected_posts'] : null;
				if ( $ajn_var_selected_posts ) {

					?>
				<div class="related-posts ">
				<h3><?php esc_html_e( 'Related Posts', 'AJNodes_td' ); ?></h3>
							<?php
							foreach ( $ajn_var_selected_posts as $ajn_var_post_id ) {

								$ajn_post_fields = get_fields( $ajn_var_post_id );
								if ( ! has_post_thumbnail( $ajn_var_post_id ) ) {
									echo '<img class="" src="' . esc_url( get_template_directory_uri() ) . '/assets/build/images/admin/defaults/default-image.webp" >';
								} else {
									echo get_the_post_thumbnail(
										$ajn_var_post_id,
										'thumb_900',
									);
								}

								get_template_part( 'partials/content', 'archive-post' );
							}
							?>
			</div>
					<?php
				}
				wp_reset_postdata();
			}
			?>
		</article>
	</div>
</div>
