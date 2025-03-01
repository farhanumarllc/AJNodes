<?php
/**
 * The template for displaying website header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AJNodes
 * @since 1.0.0
 */

list( $ajn_var_post_id, $ajn_fields, $ajn_option_fields ) = AJNodes::defaults();

// Page Tags - Advanced custom fields variables.
$ajn_var_tracking = $ajn_option_fields['custom_scripts'] ?? '';
$ajn_var_ccss     = $ajn_option_fields['custom_css'] ?? '';
$ajn_var_hscripts = $ajn_option_fields['head_scripts'] ?? '';
$ajn_var_bscripts = $ajn_option_fields['body_scripts'] ?? '';

$ajn_var_tohdr_btn     = $ajn_option_fields['ajn_var_tohdr_btn'] ?? null;
$ajn_var_tohdr_btn_two = $ajn_option_fields['ajn_var_tohdr_btn_two'] ?? null;
$ajn_var_tohdr_btn_two = $ajn_option_fields['ajn_var_tohdr_btn_two'] ?? null;
$ajn_var_tohdr_opjt_btn    = $ajn_option_fields['ajn_var_tohdr_opjt_btn'] ?? null;
// Page variables - Advanced custom fields variables.

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<?php
		// Add Head Scripts.
	if ( AJNodes::if_live() ) {

		if ( '' !== $ajn_var_hscripts ) {
			echo html_entity_decode( $ajn_var_hscripts, ENT_QUOTES );
		}
	}
	?>
	<link rel="apple-touch-icon" sizes="180x180"
		href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/pwa/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32"
		href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/pwa/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16"
		href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/pwa/favicon-16x16.png">
	<link rel="icon" sizes="any"
		href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/pwa/favicon.ico">
	<link rel="icon" type="image/svg+xml"
		href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/pwa/icon.svg">
	<link rel="manifest"
		href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/pwa/site.webmanifest">
	<meta name="theme-color" content="#0047FE">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="application-name" content="AJNodes">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton_color" content="#0047FE">
	<meta name="msapplication-TileColor" content="#0047FE">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="msapplication-TileImage"
		content="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/pwa/pwa-icon-144.png">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#0047FE">
	<?php
		// Tracking Code.
	if ( '' !== $ajn_var_tracking ) {
		echo html_entity_decode( $ajn_var_tracking, ENT_QUOTES );
	}

		// Custom CSS.
	if ( '' !== $ajn_var_ccss ) {
		echo '<style type="text/css">';
		echo html_entity_decode( $ajn_var_ccss, ENT_QUOTES );
		echo '</style>';
	}
	?>
	<?php wp_head(); ?> <script>
	"serviceWorker" in navigator && window.addEventListener("load", function() {
		navigator.serviceWorker.register("/sw.js").then(function(e) {
			console.log("ServiceWorker registration successful with scope: ", e.scope)
		}, function(e) {
			console.log("ServiceWorker registration failed: ", e)
		})
	});
	jQuery(document).ready(function() {
		if (jQuery('#top-bar-ajax').length > 0) {
			jQuery('#top-bar-ajax').topBar();
		}
	});
	</script>

</head>

<body <?php body_class(); ?>> <?php wp_body_open(); ?>
	<?php
	if ( AJNodes::if_live() ) {
		if ( '' !== $ajn_var_bscripts ) {
			?>
			<div style="display: none;">
				<?php echo html_entity_decode( $ajn_var_bscripts, ENT_QUOTES ); ?>
			</div>
			<?php
		}
	}
	?>

	<a class="skip-link screen-reader-text"
		href="#page-section"><?php esc_html_e( 'Skip to content', 'AJNodes_td' ); ?></a>
	<header>
		<div class="wrapper">
			<div class="header-section">
				<div class="flex-between-center">
					<div class="header-logo logo">
						<div class="header-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/images/site-logo.svg" alt="Site Logo" />
							</a>
						</div>
					</div>
					<div class="right-header header-navigation">
						<div class="nav-overlay">
							<div class="nav-container">
								<div class="header-nav">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'header-nav',
											'fallback_cb'    => 'AJNodes::nav_fallback',
										)
									);
								?>
								</div>
							</div>
							<?php if($ajn_var_tohdr_btn){ ?>
							<div class="headerBtn">
								<?php echo AJNodes::button($ajn_var_tohdr_btn,"ajn-button"); ?>
							</div>
							<?php } ?>
						</div>
						<div class="headerButtons d-flex align-items-center">3
							<?php if($ajn_var_tohdr_btn_two){ ?>
							<div class="headerButton">
								<?php echo AJNodes::button($ajn_var_tohdr_btn,"ajn-button"); ?>
							</div>
							<?php } ?>
							<div class="menu-toggle ">
								<div class="menu-btn">
									<span></span>
									<span></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Main Area Start -->
	<main id="main-section" class="main-section">
	<div class="page-button">
		<a href="#" class="link"><span>START YOUR PROJECT</span></a>
	</div>
