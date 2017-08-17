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
		}
	}

	/**
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Custom_Typekit_Fonts::get_instance();
}// End if().
