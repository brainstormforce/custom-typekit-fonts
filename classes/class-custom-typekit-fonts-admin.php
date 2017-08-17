<?php
/**
 * Bsf Custom Fonts Admin Ui
 *
 * @since  1.0.0
 * @package Bsf_Custom_Fonts
 */

defined( 'ABSPATH' ) or exit;

if ( ! class_exists( 'Custom_Typekit_Fonts_Admin' ) ) :

	/**
	 * Custom_Typekit_Fonts_Admin
	 */
	class Custom_Typekit_Fonts_Admin {

		/**
		 * Instance of Custom_Typekit_Fonts_Admin
		 *
		 * @since  1.0.0
		 * @var (Object) Custom_Typekit_Fonts_Admin
		 */
		private static $_instance = null;

		/**
		 * Parent Menu Slug
		 *
		 * @since  1.0.0
		 * @var (string) $parent_menu_slug
		 */
		protected $parent_menu_slug = 'themes.php';

		/**
		 * Instance of Custom_Typekit_Fonts_Admin.
		 *
		 * @since  1.0.0
		 *
		 * @return object Class object.
		 */
		public static function get_instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		/**
		 * Constructor.
		 *
		 * @since  1.0.0
		 */
		public function __construct() {
			add_action( 'admin_menu', array( $this, 'register_custom_fonts_menu' ) );

			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

			add_action( 'wp_ajax_set_typekit_fonts',      array( $this, 'set_typekit_fonts' ) );

		}

		/**
		 * Register custom font menu
		 *
		 * @since 1.0.0
		 */
		public function register_custom_fonts_menu() {
			add_options_page(
				__( 'Custom Typekit Fonts', 'custom-typekit-fonts' ),
				__( 'Custom Typekit Fonts', 'custom-typekit-fonts' ),
				'edit_theme_options',
				'custom-typekit-fonts',
				array( $this, 'typekit_options_page' )
			);

			add_submenu_page(
				'themes.php',
				__( 'Custom Typekit Fonts', 'custom-typekit-fonts' ),
				__( 'Custom Typekit Fonts', 'custom-typekit-fonts' ),
				'edit_theme_options',
				'custom-typekit-fonts',
				array( $this, 'typekit_options_page' )
			);
		}

		/**
		 * Typekit Custom Fonts Setting page
		 *
		 * @since 1.0.0
		 */
		public function typekit_options_page() {

			require_once CUSTOM_TYPEKIT_FONTS_DIR . 'templates/custom-typekit-fonts-options.php';
		}

		/**
		 * Activate module
		 */
		function set_typekit_fonts() {

			check_ajax_referer( 'custom-typekit-fonts-nonce', 'nonce' );

			// sanitize multi dimension array.
			$typekit_list = $_POST['kit_list'];
			if ( is_array( $typekit_list ) ) {
				foreach ( $lists as $list ) {
					$list = esc_attr( $list );
				}
				unset( $list );
			} else {
				$typekit_list = esc_attr( $lists );
			}

			$typekit_array = array();
			foreach ( $typekit_list as $fonts ) {
				$family = $fonts['family'];
				foreach ( $fonts as $key => $value ) {
					if ( 'family' != $key ) {
						$typekit_array[ $family ][ $key ] = $value;
					}
				}
			}

			$new_list = array(
				'kit-id' => sanitize_text_field( $_POST['typekit_id'] ),
				'kit-list' => $typekit_array,
			);

			update_option( 'custom-typekit-fonts', $new_list );

			echo true;
			die();
		}

		/**
		 * Enqueue Admin Scripts
		 *
		 * @since 1.0.0
		 */
		public function enqueue_scripts() {

			wp_enqueue_style( 'custom-typekit-fonts-css', CUSTOM_TYPEKIT_FONTS_URI . 'assets/css/custom-typekit-fonts.css', array(), CUSTOM_TYPEKIT_FONTS_VER );

			wp_enqueue_script( 'custom-typekit-fonts-js', CUSTOM_TYPEKIT_FONTS_URI . 'assets/js/custom-typekit-fonts.js', array( 'jquery-ui-tooltip' ), CUSTOM_TYPEKIT_FONTS_VER );

			$options = array(
				'ajax_nonce' => wp_create_nonce( 'custom-typekit-fonts-nonce' ),
				'message' => array(
					'active' => __( 'Active', 'custom-typekit-fonts' ),
					'invalid_id' => __( 'Please make sure kit ID you entered is correct and try again.', 'custom-typekit-fonts' ),
					'success' => __( 'Successfully updated the published Kit Details.', 'custom-typekit-fonts' ),
				),
			);

			wp_localize_script( 'custom-typekit-fonts-js', 'typekitCustomFonts', $options );

		}

	}



	/**
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Custom_Typekit_Fonts_Admin::get_instance();

endif;
