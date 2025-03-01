<?php
/**
 * Ajax related functions
 *
 * @link https://codex.wordpress.org/AJAX#Ajax_in_WordPress
 *
 * @package AJNodes
 * @since 1.0.0
 */

namespace AJNodes\Ajax;

/**
 * Template Class For Ajax
 *
 * Template Class
 *
 * @category Setting_Class
 * @package  AJNodes
 */
class WP_Theme_Ajax {
	/**
	 * Define class Constructor
	 **/
	public function __construct() {

		add_action( 'wp_ajax_nopriv_search', array( $this, 'search' ) );
		add_action( 'wp_ajax_search', array( $this, 'search' ) );
	}


	/**
	 * Define ajax filter
	 **/
	public function search() {
		if ( isset( $_POST['nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'ajax_nonce' ) ) {
			$crm_var_serach = $_POST['searchValue'] ?? null;
			$crm_var_paged = $_POST['paged'] ?? null;
			$args           = array(
				'post_type'      => array( 'post'),
				'post_status'    => 'publish',
				'posts_per_page' => 10,
				'paged' =>$crm_var_paged
			);
			if ( ! empty( $crm_var_serach ) && " " !== $crm_var_serach   ) {
					$args['s'] = $crm_var_serach;
				}
			$query          = new \WP_Query( $args );
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
						ob_start();
						get_template_part( 'partials/content', 'archive-post'  );
					$chn_var_search_html = ob_get_clean();
					$response[]          = $chn_var_search_html;
				}
				wp_reset_postdata();
			} else {
				$response = '<h4 class="center-align no-post-found-heading">No Content Found Please Try Different Search Keywords</h4>
				';
			}
			if ( $query->have_posts() ) {
				if (  $query->max_num_pages > 1 ) {
						$pagination = '<div class="center-align">
							<a href="' . esc_html(($query->max_num_pages)) . '" class="wp-block-button__link wp-element-button" id="ajax-loadmore-click">' . esc_html__('Load More', 'AJNodes_td') . '</a>
						</div>';
				}
			}

			wp_send_json(
				array(
					'args'    => $query->found_posts,
					'html'    => $response,
					'pagination' => $pagination,
					'post'    => $_POST,
				)
			);
			wp_die();
		}
	}

}
new WP_Theme_Ajax();
