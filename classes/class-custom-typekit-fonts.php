<?php
/**
 * Typekit Custom fonts - Init
 *
 * @package Custom_Typekit_Fonts
 */

if ( ! class_exists( 'Custom_Typekit_Fonts' ) ) {

	/**
	 * Typekit Custom fonts
	 *
	 * @since 1.0.0
	 */
	class Custom_Typekit_Fonts {

		/**
		 * Member Varible
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor function that initializes required actions and hooks
		 */
		public function __construct() {
			require_once CUSTOM_TYPEKIT_FONTS_DIR . 'classes/class-custom-typekit-fonts-admin.php';
			require_once CUSTOM_TYPEKIT_FONTS_DIR . 'classes/class-custom-typekit-fonts-render.php';

			add_action( 'init', array( $this, 'options_setting' ) );
		}

		/**
		 * Update the custom-typekit-font option
		 *
		 * @since 1.0.0
		 */
		public function options_setting() {

			if ( isset( $_POST['custom-typekit-fonts-nonce'] ) && wp_verify_nonce( $_POST['custom-typekit-fonts-nonce'], 'custom-typekit-fonts' ) ) {

				if ( isset( $_POST['custom-typekit-fonts-submitted'] ) ) {
					if ( sanitize_text_field( $_POST['custom-typekit-fonts-submitted'] ) == 'submitted' ) {

						$option = array();
						$option['custom-typekit-font-id']  = sanitize_text_field( $_POST['custom-typekit-font-id'] );
						$option['custom-typekit-font-details'] = $this->get_custom_typekit_details( $option['custom-typekit-font-id'] );

						if ( empty( $option['custom-typekit-font-details'] ) ) {
							$_POST['custom-typekit-font-notice'] = true;

							// Get all stored typekit fonts.
							// Search it in 'get_option( ASTRA_THEME_SETTINGS )'.
							// If found set 'inherit'.
							// Update 'ASTRA_THEME_SETTINGS'.
							if ( defined( 'ASTRA_THEME_SETTINGS' ) ) {
									// get astra options.
									$options = get_option( ASTRA_THEME_SETTINGS );
									$custom_typekit = get_option( 'custom-typekit-fonts' );
								foreach ( $options as $key => $value ) {
									$font_arr = explode( ',', $value );
									$font_name = $font_arr[0];
									if ( isset( $custom_typekit['custom-typekit-font-details'][ $font_name ] ) ) {
										// set default inherit if custom font is deleted.
										$options[ $key ] = 'inherit';
									}
								}
								// update astra options.
								update_option( ASTRA_THEME_SETTINGS, $options );
							}
						}

						update_option( 'custom-typekit-fonts', $option );

					}
				}
			}
		}

		/**
		 * Get the Kit details usign wp_remote_get.
		 *
		 * @since 1.0.0
		 * @param string $kit_id Typekit ID.
		 */
		function get_custom_typekit_details( $kit_id ) {

			$typekit_info = array();
			$typekit_uri     = 'https://typekit.com/api/v1/json/kits/' . $kit_id . '/published';
			$response = wp_remote_get(
				$typekit_uri,
				array(
					'timeout'   => '30',
				)
			);

			if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) !== 200 ) {
				return $typekit_info;
			}
				$data     = json_decode( wp_remote_retrieve_body( $response ), true );

				$families = $data['kit']['families'];

			foreach ( $families as $family ) :

				$typekit_info[ $family['name'] ] = array(
					'family'  => $family['name'],
					'fallback'   => str_replace( '"', '', $family['css_stack'] ),
					'weights' => array(),
				);

				foreach ( $family['variations'] as $variation ) :

					$variations = str_split( $variation );

					switch ( $variations[0] ) {
						case 'n':
							$style = 'normal';
							break;
						default:
							$style = 'normal';
							break;
					}

					$weight    = $variations[1] . '00';

					if ( ! in_array( $weight, $typekit_info[ $family['name'] ]['weights'] ) ) {
						$typekit_info[ $family['name'] ]['weights'][] = $weight;
					}

				endforeach;

				endforeach;

				return $typekit_info;
		}

	}

	/**
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Custom_Typekit_Fonts::get_instance();
}// End if().
