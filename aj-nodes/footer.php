<?php
/**
 * The template for displaying website footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AJNodes
 * @since 1.0.0
 */

list( $ajn_var_post_id, $ajn_fields, $ajn_option_fields ) = AJNodes::defaults();
// Default Footer Options.
$ajn_var_footer_scripts = $ajn_option_fields['footer_scripts'] ?? '';



// Schema Markup - ACF variables.
$ajn_var_schema_check = $ajn_option_fields['ajn_var_schema_check'] ?? null;
if ( $ajn_var_schema_check ) {
	$ajn_var_schema_business_name       = $ajn_option_fields['ajn_var_schema_business_name'] ?? null;
	$ajn_var_schema_business_legal_name = $ajn_option_fields['ajn_var_schema_business_legal_name'] ?? null;
	$ajn_var_schema_street_address      = $ajn_option_fields['ajn_var_schema_street_address'] ?? null;
	$ajn_var_schema_locality            = $ajn_option_fields['ajn_var_schema_locality'] ?? null;
	$ajn_var_schema_region              = $ajn_option_fields['ajn_var_schema_region'] ?? null;
	$ajn_var_schema_postal_code         = $ajn_option_fields['ajn_var_schema_postal_code'] ?? null;
	$ajn_var_schema_map_short_link      = $ajn_option_fields['ajn_var_schema_map_short_link'] ?? null;
	$ajn_var_schema_latitude            = $ajn_option_fields['ajn_var_schema_latitude'] ?? null;
	$ajn_var_schema_longitude           = $ajn_option_fields['ajn_var_schema_longitude'] ?? null;
	$ajn_var_schema_opening_hours       = $ajn_option_fields['ajn_var_schema_opening_hours'] ?? null;
	$ajn_var_schema_telephone           = $ajn_option_fields['ajn_var_schema_telephone'] ?? null;
	$ajn_var_schema_business_email      = $ajn_option_fields['ajn_var_schema_business_email'] ?? null;
	$ajn_var_schema_business_logo       = $ajn_option_fields['ajn_var_schema_business_logo'] ?? null;
	$ajn_var_schema_price_range         = $ajn_option_fields['ajn_var_schema_price_range'] ?? null;
	$ajn_var_schema_type                = $ajn_option_fields['ajn_var_schema_type'] ?? null;
}
// Custom - ACF variables.

$ajn_var_ftrop_title        = $ajn_option_fields['ajn_var_ftrop_title'] ?? null;
$ajn_var_ftrop_email        = $ajn_option_fields['ajn_var_ftrop_email'] ?? null;
$ajn_var_ftrop_copyright    = $ajn_option_fields['ajn_var_ftrop_copyright'] ?? null;
$ajn_var_partnar_logo       = $ajn_option_fields['ajn_var_partnar_logo'] ?? null;
$ajn_var_partnar_title      = $ajn_option_fields['ajn_var_partnar_title'] ?? null;
$ajn_var_partnar_logo_image = $ajn_option_fields['ajn_var_partnar_logo_image'] ?? null;
$ajn_var_partnar_logo_name  = $ajn_option_fields['ajn_var_partnar_logo_name'] ?? null;

?>
</main>
<footer id="footer-section" class="footer-section">
	<!-- Footer Start -->
	<div class="footer-ctn">
		<?php get_template_part( 'partials/cta' ); ?>
		<div class="wrapper">
			<div class="footer-widgets d-flex justify-content-between flex-wrap">
				<div class="single-widget">
					<?php if ( $ajn_var_ftrop_title ) { ?>
					<h3 class="heading-4">
						<?php echo html_entity_decode( $ajn_var_ftrop_title ); ?>
					</h3>
					<?php } ?>
					<?php if ( $ajn_var_ftrop_email ) { ?>
					<div class="footer-email">
						<a href="mailto:<?php echo esc_html( $ajn_var_ftrop_email ); ?>" class="heading-3"><?php echo esc_html( $ajn_var_ftrop_email ); ?></a>
					</div>
					<?php } ?>
				</div>
				<div class="single-widget">
					<div class="footer-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/images/footer-logo.svg" alt="">
						</a>
					</div>
				</div>
			</div>
			<div class="gl-s96"></div>
			<div class="footer-bottom ">
				<div class="footer-widgets d-flex justify-content-between flex-wrap">
					<div class="single-widget">
						<div class="footer-bottom-area d-flex flex-wrap">
							<div class="our-partners">
								<div class="footer-nav">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'footer-nav',
											'fallback_cb' => 'AJNodes::nav_fallback',
										)
									);
									?>
								</div>
									<?php
									if ( $ajn_var_partnar_logo ) {
										?>
										<div class="partner-logos d-flex flex-wrap align-items-center">
											<?php
											foreach ( $ajn_var_partnar_logo as $key => $ajn_var_partnar_log ) {
												$ajn_var_partnar_logo_id   = $ajn_var_partnar_log['image'] ?? null;
												$ajn_var_partnar_logo_link = $ajn_var_partnar_log['link'] ?? null;
												?>
													<div class="single-logo">
														<?php
														if ( $ajn_var_partnar_logo_id ) {
															AJNodes::the_attachment_image( $ajn_var_partnar_logo_id, 400 );
														}
														?>
													</div>
													<?php
											}
											?>
										</div>
										<?php
									}
									?>
							</div>
							<div class="our-developer">
								<?php if ( $ajn_var_partnar_title ) { ?>
								<div class="dev-title"><?php echo esc_html( $ajn_var_partnar_title ); ?></div>
								<?php } ?>
								<div class="developer-detail">
									<a href="#">
										<?php if ( $ajn_var_partnar_logo_image ) { ?>
										<div class="dev-image">
											<?php AJNodes::the_attachment_image( $ajn_var_partnar_logo_image, 200 ); ?>
										</div>
										<?php } ?>
										<?php if ( $ajn_var_partnar_logo_name ) { ?>
										<div class="developer-title"><?php echo html_entity_decode( $ajn_var_partnar_logo_name ); ?></div>
										<?php } ?>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="single-widget">
						<div class="legal-nav">
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'legal-nav',
										'fallback_cb'    => 'AJNodes::nav_fallback',
									)
								);
								?>
						</div>
						<?php if ( $ajn_var_ftrop_copyright ) { ?>
						<div class=" copy-right"><?php echo esc_html( $ajn_var_ftrop_copyright ); ?></div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/js/vendors/swiper-bundle.min.js"></script>

</footer>

<?php wp_footer(); ?>
<?php
if ( '' !== $ajn_var_footer_scripts ) {
	?>
<div style="display: none;">
	<?php echo html_entity_decode( $ajn_var_footer_scripts, ENT_QUOTES ); ?>
</div>
<?php } ?>
</body>

</html>
