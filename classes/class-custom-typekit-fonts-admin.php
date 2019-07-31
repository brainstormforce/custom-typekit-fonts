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
			add_action( 'admin_menu', array( $this, 'register_custom_fonts_menu' ), 101 );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'admin_notices', array( $this, 'set_custom_typekit_fonts_notice' ) );

		}

		/**
		 * Set admin notice
		 *
		 * @since 1.0.0
		 */
		public function set_custom_typekit_fonts_notice() {

			// Notice for Custom Typekit Fonts action.
			if ( isset( $_POST['custom-typekit-fonts-nonce'] ) && wp_verify_nonce( $_POST['custom-typekit-fonts-nonce'], 'custom-typekit-fonts' ) ) {

				if ( isset( $_POST['custom-typekit-fonts-submitted'] ) ) {
					if ( sanitize_text_field( $_POST['custom-typekit-fonts-submitted'] ) == 'submitted' && current_user_can( 'manage_options' ) ) {
						?>

						<?php
						// Kit ID is not valid.
						if ( isset( $_POST['custom-typekit-id-notice'] ) && $_POST['custom-typekit-id-notice'] ) {
							?>
							<div class="notice notice-error is-dismissible">
								<p><?php _e( 'Please Enter the Valid Kit ID to get the kit details.', 'custom-typekit-fonts' ); ?></p>
							</div>
							<?php
						} elseif ( isset( $_POST['custom-typekit-empty-notice'] ) && $_POST['custom-typekit-empty-notice'] ) {
							?>
							<div class="notice notice-warning is-dismissible">
								<p><?php _e( 'This Kit is empty. Please add some fonts in it.', 'custom-typekit-fonts' ); ?></p>
							</div>
							<?php } else { ?>
							<div class="notice notice-success is-dismissible">
								<p><?php _e( 'Custom Typekit Fonts settings have been successfully saved.', 'custom-typekit-fonts' ); ?></p>
							</div>
							<?php
							}
					}
				}
			}
		}

		/**
		 * Register custom font menu
		 *
		 * @since 1.0.0
		 */
		public function register_custom_fonts_menu() {

			$title = apply_filters( 'custom_typekit_fonts_menu_title', __( 'Adobe Fonts', 'custom-typekit-fonts' ) );

			add_submenu_page(
				'themes.php',
				$title,
				$title,
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
		 * Enqueue Admin Scripts
		 *
		 * @since 1.0.0
		 */
		public function enqueue_scripts() {

			if ( 'appearance_page_custom-typekit-fonts' !== get_current_screen()->id ) {
				return;
			}

			wp_enqueue_style( 'custom-typekit-fonts-css', CUSTOM_TYPEKIT_FONTS_URI . 'assets/css/custom-typekit-fonts.css', array(), CUSTOM_TYPEKIT_FONTS_VER );

			wp_enqueue_script( 'custom-typekit-fonts-js', CUSTOM_TYPEKIT_FONTS_URI . 'assets/js/custom-typekit-fonts.js', array( 'jquery-ui-tooltip' ), CUSTOM_TYPEKIT_FONTS_VER );

		}

	}


	/**
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Custom_Typekit_Fonts_Admin::get_instance();

endif;
