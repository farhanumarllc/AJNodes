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


$ajn_var_posttitle = $ajn_post_fields['ajn_var_posttitle'] ?? get_the_title( $ajn_var_post_id );

$ajn_var_categories       = get_the_category( $ajn_var_post_id );
$ajn_var_categories_links = array();

foreach ( $ajn_var_categories as $ajn_var_categories ) {
	 $ajn_var_category_link     = get_category_link( $ajn_var_categories->term_id );
	$ajn_var_categories_links[] = '<a href="' . esc_url( $ajn_var_category_link ) . '">' . esc_html( $ajn_var_categories->name ) . '</a>';
}
?>
<section id="hero-section" class="hero-section hero-home hero-resource-detail">
	<div class="hero-home-inner">
		<div class="wrapper">
			<div class="home-hero-text">
				<div class="post-box-meta d-flex justify-content-between">
					<div class="post-date"><?php echo get_the_date( 'F j, Y', $ajn_var_post_id ); ?></div>
					<?php if ( $ajn_var_categories_links ) { ?>
					<div class="ac-post-cat">
						<?php echo html_entity_decode( implode( ', ', $ajn_var_categories_links ) ); ?>
					</div>
					<?php } ?>
				</div>
				<h1 class="heading"><span><?php echo esc_html( $ajn_var_posttitle ); ?></span></h1>
			</div>
			<?php if ( has_post_thumbnail( $ajn_var_post_id ) ) { ?>
			<div class="hero-resource-image">
				<?php AJNodes::the_featured_image( $ajn_var_post_id, 800 ); ?>
			</div>
			<?php } ?>

			<div class="post-meta d-flex align-items-center justify-content-between">
				<div class="post-share-label">
					<?php esc_html_e( 'SHARE THIS RESOURCE ', 'AJNodes_td' ); ?></div>
				<!-- /.post-cat -->
				<div class="post-shares">
					<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>"
						rel="noopener" rel="noreferrer"
						onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<svg role=" none" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							viewBox="0 0 24 24" fill="none">
							<rect width="24" height="24" fill="#00a4eb"></rect>
							<path
								d="M12.9757 18.2992V12.5522H14.904L15.1933 10.3118H12.9757V8.88164C12.9757 8.2332 13.155 7.7913 14.0859 7.7913L15.2713 7.79081V5.78693C15.0663 5.76029 14.3627 5.69922 13.5437 5.69922C11.8335 5.69922 10.6626 6.74311 10.6626 8.65976V10.3118H8.72852V12.5522H10.6626V18.2992H12.9757Z"
								fill="white"></path>
						</svg>
					</a>
					<a href="http://twitter.com/intent/tweet?text=Currently reading <?php the_title(); ?>&amp;url=<?php the_permalink(); ?>"
						rel="noopener" rel="noreferrer"
						onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">

						<svg role="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							viewBox="0 0 24 24" fill="none">
							<rect width="24" height="24" fill="#00a4eb"></rect>
							<path
								d="M13.3031 10.928L18.4029 5H17.1944L12.7663 10.1472L9.22958 5H5.15039L10.4986 12.7835L5.15039 19H6.35894L11.0351 13.5643L14.7702 19H18.8494L13.3028 10.928H13.3031ZM11.6479 12.8521L11.106 12.077L6.79439 5.90977H8.65065L12.1302 10.887L12.672 11.662L17.195 18.1316H15.3387L11.6479 12.8524V12.8521Z"
								fill="white"></path>
						</svg>
					</a>
					<a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>"
						rel="noopener" rel="noreferrer"
						onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">

						<svg role="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							viewBox="0 0 24 24" fill="none">
							<rect width="24" height="24" fill="#00a4eb"></rect>
							<path
								d="M17.0396 17.0406V13.3488C17.0396 11.5344 16.649 10.1484 14.5322 10.1484C13.5116 10.1484 12.8312 10.7028 12.554 11.232H12.5288V10.3122H10.5254V17.0406H12.617V13.7016C12.617 12.8196 12.7808 11.9754 13.8644 11.9754C14.9354 11.9754 14.948 12.9708 14.948 13.752V17.028H17.0396V17.0406Z"
								fill="white"></path>
							<path d="M7.12402 10.3125H9.21562V17.0409H7.12402V10.3125Z" fill="white"></path>
							<path
								d="M8.16956 6.96094C7.50176 6.96094 6.95996 7.50274 6.95996 8.17054C6.95996 8.83834 7.50176 9.39274 8.16956 9.39274C8.83736 9.39274 9.37916 8.83834 9.37916 8.17054C9.37916 7.50274 8.83736 6.96094 8.16956 6.96094Z"
								fill="white"></path>
						</svg>
					</a>
				</div>
				<!-- /.post-shares -->
			</div>
		</div>
	</div>
</section>
<section id="" class="page-section">
	<div class="gl-s72"></div>
	<section>
	<div class="ctn-1060">
		<div class="wrapper">
			<?php get_template_part( 'partials/content' ); ?>
		</div>
	</div>
	</section>
	<section>
	    <div class="wrapper">
	        <div class="recent-posts">
			<h2><span>Recent Posts</span></h2>
			<div class="post-archive three-columns">
				<?php
				$ajn_var_slectiion_post_type = isset( $ajn_fields['ajn_var_slectiion_post_type'] ) ? $ajn_fields['ajn_var_slectiion_post_type'] : null;
				if ( 'selection' === $ajn_var_slectiion_post_type ) {

					$ajn_var_selected_postrs = isset( $ajn_fields['ajn_var_selected_postrs'] ) ? $ajn_fields['ajn_var_selected_postrs'] : null;
					if ( $ajn_var_selected_postrs ) {
						foreach ( $ajn_var_selected_postrs as $ajn_var_selected_post ) {
							get_template_part( 'partials/content', 'archive-post', array( 'ajn_var_archieve_post_id' => $ajn_var_selected_post ) );
						}
					}
					wp_reset_postdata();
				} else {

					$ajn_args  = array(
						'posts_per_page' => 3,
						'post__not_in'   => array( $ajn_var_post_id ),
						'orderby'        => 'rand',
					);
					$ajn_query = new WP_Query( $ajn_args );
					if ( $ajn_query->have_posts() ) {
						while ( $ajn_query->have_posts() ) {
							$ajn_query->the_post();
							get_template_part( 'partials/content', 'archive-post' );
						}
					}
					wp_reset_postdata();
				}
				?>
			</div>
		</div>
	    </div>
	</section>
<div class="gl-s160"></div>
</section>
