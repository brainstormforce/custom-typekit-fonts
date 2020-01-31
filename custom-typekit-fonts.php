<?php
/**
 * Plugin Name:     Custom Adobe Fonts (Typekit)
 * Plugin URI:      http://www.wpastra.com/
 * Description:     Custom Adobe Fonts allows you to extends the fonts supports from the Typekit.
 * Author:          Brainstorm Force
 * Author URI:      http://www.brainstormforce.com
 * Text Domain:     custom-typekit-fonts
 * Version:         1.0.13
 *
 * @package         Typekit_Custom_Fonts
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

/**
 * Set constants.
 */
define( 'CUSTOM_TYPEKIT_FONTS_FILE', __FILE__ );
define( 'CUSTOM_TYPEKIT_FONTS_BASE', plugin_basename( CUSTOM_TYPEKIT_FONTS_FILE ) );
define( 'CUSTOM_TYPEKIT_FONTS_DIR', plugin_dir_path( CUSTOM_TYPEKIT_FONTS_FILE ) );
define( 'CUSTOM_TYPEKIT_FONTS_URI', plugins_url( '/', CUSTOM_TYPEKIT_FONTS_FILE ) );
define( 'CUSTOM_TYPEKIT_FONTS_VER', '1.0.13' );
/**
 * BSF Custom Fonts
 */
require_once CUSTOM_TYPEKIT_FONTS_DIR . 'classes/class-custom-typekit-fonts.php';
require_once CUSTOM_TYPEKIT_FONTS_DIR . 'inc/lib/notices/class-astra-notices.php';

if ( ! function_exists( 'register_notices' ) ) :

	/**
	 * Ask Theme Rating
	 *
	 * @since 1.4.0
	 */
	function register_notices() {
		$image_path = CUSTOM_TYPEKIT_FONTS_URI . 'assets/images/custom-typekit-fonts-icon.png';
		Astra_Notices::add_notice(
			array(
				'id'                         => 'custom-typekit-fonts-rating',
				'type'                       => '',
				'message'                    => sprintf(
					'<div class="notice-image">
							<img src="%1$s" class="custom-logo" alt="Astra" itemprop="logo"></div> 
							<div class="notice-content">
								<div class="notice-heading">
									%2$s
								</div>
								%3$s<br />
								<div class="astra-review-notice-container">
									<a href="%4$s" class="astra-notice-close astra-review-notice button-primary" target="_blank">
									%5$s
									</a>
								<span class="dashicons dashicons-calendar"></span>
									<a href="#" data-repeat-notice-after="%6$s" class="astra-notice-close astra-review-notice">
									%7$s
									</a>
								<span class="dashicons dashicons-smiley"></span>
									<a href="#" class="astra-notice-close astra-review-notice">
									%8$s
									</a>
								</div>
							</div>',
					$image_path,
					__( 'Hello! Seems like you have used Custom Typekit Fonts to build this website — Thanks a ton!', 'custom-typekit-fonts' ),
					__( 'Could you please do us a BIG favor and give it a 5-star rating on WordPress? This would boost our motivation and help other users make a comfortable decision while choosing the Custom Typekit Fonts.', 'custom-typekit-fonts' ),
					'https://wordpress.org/support/plugin/custom-typekit-fonts/reviews/?filter=5#new-post',
					__( 'Ok, you deserve it', 'custom-typekit-fonts' ),
					MONTH_IN_SECONDS,
					__( 'Nope, maybe later', 'custom-typekit-fonts' ),
					__( 'I already did', 'custom-typekit-fonts' )
				),
				'repeat-notice-after'        => MONTH_IN_SECONDS,
				'priority'                   => 25,
				'display-with-other-notices' => false,
			)
		);
	}

	add_action( 'admin_notices', 'register_notices' );

endif;
