<?php
/**
 * Custom Typekit Fonts Update
 *
 * @package     Custom Typekit Fonts
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2018, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */

if ( ! class_exists( 'Custom_Typekit_Fonts_Update' ) ) {

	/**
	 * Custom_Typekit_Fonts_Update initial setup
	 *
	 * @since 1.0.0
	 */
	class Custom_Typekit_Fonts_Update {


		/**
		 * Class instance.
		 *
		 * @access private
		 * @var $instance Class instance.
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 *  Constructor
		 */
		public function __construct() {

			// Theme Updates.
			if ( is_admin() ) {
				add_action( 'admin_init', array( $this, 'init' ), 5 );
			} else {
				add_action( 'init', array( $this, 'init' ), 5 );
			}

		}

		/**
		 * Return option name for storing the custom typekit version.
		 *
		 * @return String
		 */
		private function get_option_name() {
			return '_custom_typekit_fonts_version';
		}

		/**
		 * Implement theme update logic.
		 *
		 * @since 1.0.7
		 */
		public function init() {
			do_action( 'custom_typekit_fonts_update_before' );

			// Get auto saved version number.
			$saved_version = get_option( $this->get_option_name(), false );

			// If equals then return.
			if ( version_compare( $saved_version, CUSTOM_TYPEKIT_FONTS_VER, '=' ) ) {
				return;
			}

			// Update to older version than 1.0.8 version.
			if ( version_compare( $saved_version, '1.0.8', '<' ) ) {
				$this->v_1_0_8();
			}

			// Update auto saved version number.
			update_option( $this->get_option_name(), CUSTOM_TYPEKIT_FONTS_VER );

			do_action( 'custom_typekit_fonts_update_after' );
		}

		/**
		 * Force udpate typekit fonts.
		 *
		 * @return void
		 */
		private function v_1_0_8() {
			$typekit                               = new Custom_Typekit_Fonts();
			$custom_typekit                        = get_option( 'custom-typekit-fonts' );
			$option                                = array();
			$option['custom-typekit-font-id']      = sanitize_text_field( $custom_typekit['custom-typekit-font-id'] );
			$option['custom-typekit-font-details'] = $typekit->get_custom_typekit_details( $custom_typekit['custom-typekit-font-id'] );

			update_option( 'custom-typekit-fonts', $option );
		}

	}

}

/**
 * Kicking this off by calling 'get_instance()' method
 */
Custom_Typekit_Fonts_Update::get_instance();
