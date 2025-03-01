<?php
/**
 * Template part for footer cta
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 *
 * @package AJNodes
 * @since 1.0.0
 */

list( $ajn_var_post_id, $ajn_fields, $ajn_option_fields, $ajn_queried_object ) = AJNodes::defaults();

$ajn_var_page_cta_pagevisibility = $ajn_fields['ajn_var_cta_visibility'] ?? null;
$ajn_var_tocta_animated_text     = $ajn_fields['ajn_var_pocta_animated_text'] ?? $ajn_option_fields['ajn_var_tocta_animated_text'] ?? null;
$ajn_var_to_cta_headline         = $ajn_fields['ajn_var_pocta_title'] ?? $ajn_option_fields['ajn_var_tocta_title'] ?? null;
$ajn_var_to_cta_text             = $ajn_fields['ajn_var_pocta_text'] ?? $ajn_option_fields['ajn_var_tocta_text'] ?? null;
$ajn_var_tocta_button            = $ajn_fields['ajn_var_pocta_button'] ?? $ajn_option_fields['ajn_var_tocta_button'] ?? null;

?>
<?php if ( $ajn_var_page_cta_pagevisibility ) { ?>
	<?php if ( $ajn_var_tocta_animated_text ) { ?>
<section>
	<div class="wrapper">
		<div class='expand_txt'><?php echo esc_html( $ajn_var_tocta_animated_text ); ?></div>
	</div>
</section>
<div class="gl-s160"></div>
<?php } ?>
<section class="ctn-840">
	<div class="wrapper">
		<div class="footer-cta center-align">
			<?php if ( $ajn_var_to_cta_headline ) { ?>
			<h2><?php echo html_entity_decode( $ajn_var_to_cta_headline ); ?></h2>
				<?php
			}
			if ( $ajn_var_to_cta_text ) {
				echo html_entity_decode( $ajn_var_to_cta_text );
			}
			?>
			<?php
			if ( $ajn_var_tocta_button ) {
				echo AJNodes::animated_button( $ajn_var_tocta_button, 'ajn-button arrow-btn' );
			}
			?>
		</div>
	</div>
</section>
<div class="gl-s160"></div>
<?php } ?>
