<?php
/**
 * Bsf Custom Fonts Admin Ui
 *
 * @since  1.0.0
 * @package Bsf_Custom_Fonts
 */

defined( 'ABSPATH' ) or exit;

if ( ! class_exists( 'Custom_Typekit_Fonts_Render' ) ) :

	/**
	 * Custom_Typekit_Fonts_Render
	 */
	class Custom_Typekit_Fonts_Render {

		/**
		 * Instance of Custom_Typekit_Fonts_Render
		 *
		 * @since  1.0.0
		 * @var (Object) Custom_Typekit_Fonts_Render
		 */
		private static $_instance = null;

		/**
		 * Member Varible
		 *
		 * @var string $font_css
		 */
		protected $font_css;

		/**
		 * Font base.
		 *
		 * This is used in case of Elementor's Font param
		 *
		 * @since  1.0.4
		 * @var string
		 */
		private static $font_base = 'custom-typekit-fonts';

		/**
		 * Instance of Bsf_Custom_Fonts_Admin.
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

			add_action( 'wp_head', array( $this, 'typekit_embed_head' ) );
			// add Custom Font list into Astra customizer.
			add_action( 'astra_customizer_font_list', array( $this, 'add_customizer_font_list' ) );
			add_action( 'astra_render_fonts', array( $this, 'render_fonts' ) );
			add_filter( 'astra_custom_fonts', array( $this, 'add_typekit_fonts' ) );
			// Beaver builder theme customizer, beaver buidler page builder.
			add_filter( 'fl_theme_system_fonts', array( $this, 'bb_custom_fonts' ) );
			add_filter( 'fl_builder_font_families_system', array( $this, 'bb_custom_fonts' ) );
			// Elementor page builder.
			add_filter( 'elementor/fonts/groups', array( $this, 'elementor_group' ) );
			add_filter( 'elementor/fonts/additional_fonts', array( $this, 'add_elementor_fonts' ) );
		}

		/**
		 * Add Custom Font group to elementor font list.
		 *
		 * Group name "Custom" is added as the first element in the array.
		 *
		 * @since  1.0.4
		 * @param  Array $font_groups default font groups in elementor.
		 * @return Array              Modified font groups with newly added font group.
		 */
		public function elementor_group( $font_groups ) {
			$new_group[ self::$font_base ] = __( 'Typekit Fonts', 'custom-typekit-fonts' );
			$font_groups                   = $new_group + $font_groups;

			return $font_groups;
		}

		/**
		 * Add Custom Fonts to the Elementor Page builder's font param.
		 *
		 * @since  1.0.4
		 * @param Array $fonts Custom Font's array.
		 */
		public function add_elementor_fonts( $fonts ) {

			$all_fonts = Bsf_Custom_Fonts_Taxonomy::get_fonts();
			$kit_list     = get_option( 'custom-typekit-fonts' );
			$fonts        = $kit_list['custom-typekit-font-details'];

			if ( ! empty( $fonts ) ) {
				foreach ( $fonts as $font_family_name => $fonts_url ) {
					$fonts[ $font_family_name ] = self::$font_base;
				}
			}

			return $fonts;
		}

		/**
		 * Add Script into wp head
		 *
		 * @since  1.0.0
		 */
		function typekit_embed_head() {
			$kit_info = get_option( 'custom-typekit-fonts' );
			if ( empty( $kit_info['custom-typekit-font-details'] ) ) {
				return;
			}
			?>
			<script type="text/javascript">
			(function(d) {
				var config = {
				kitId         : '<?php echo esc_js( $kit_info['custom-typekit-font-id'] ); ?>',
				scriptTimeout : 3000,
				async         : true
				},
				h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
			})(document);
			</script>

			<?php
		}

		/**
		 * Add Custom Fonts list into
		 *
		 * @since  1.0.0
		 *
		 * @param array $custom_fonts custom fonts.
		 */
		function add_typekit_fonts( $custom_fonts ) {

			$kit_info = get_option( 'custom-typekit-fonts' );
			if ( empty( $kit_info['custom-typekit-font-details'] ) ) {
				return $custom_fonts;
			}
			$new_custom_fonts = wp_parse_args( $kit_info['custom-typekit-font-details'], $custom_fonts );

			return $new_custom_fonts;

		}

		/**
		 * Dequeue Render custom fonts
		 *
		 * @since 1.0.0
		 *
		 * @param array $load_fonts astra fonts.
		 */
		public function render_fonts( $load_fonts ) {

			$kit_list = get_option( 'custom-typekit-fonts' );
			if ( ! empty( $kit_list['custom-typekit-font-details'] ) ) {
				foreach ( $load_fonts as $load_font_name => $load_font ) {
					$font_arr  = explode( ',', $load_font_name );
					$font_name = $font_arr[0];
					// unset theme fonts to prevent the script call.
					if ( isset( $kit_list['custom-typekit-font-details'][ $font_name ] ) ) {
						unset( $load_fonts[ $load_font_name ] );
					}
				}
			}

			return $load_fonts;
		}

		/**
		 * Add Custom Font list into Astra customizer.
		 *
		 * @since  1.0.0
		 *
		 * @param string $value selected font family.
		 */
		public function add_customizer_font_list( $value ) {

			$kit_list = get_option( 'custom-typekit-fonts' );
			if ( ! empty( $kit_list['custom-typekit-font-details'] ) ) {
				echo '<optgroup label="Typekit">';
				foreach ( $kit_list['custom-typekit-font-details'] as $font => $properties ) {
					echo '<option value="' . esc_attr( $font ) . ',' . $properties['fallback'] . '" ' . selected( $font, $value, false ) . '>' . esc_attr( $font ) . '</option>';
				}
			}
		}

		/**
		 * Add Custom Font list to BB theme and BB Page Builder
		 *
		 * @since  1.0.3
		 * @param array $bb_fonts font families added by bb.
		 */
		function bb_custom_fonts( $bb_fonts ) {

			$kit_list     = get_option( 'custom-typekit-fonts' );
			$fonts        = $kit_list['custom-typekit-font-details'];
			$custom_fonts = array();
			if ( ! empty( $fonts ) ) :
				foreach ( $fonts as $font_family_name => $fonts_url ) :
					$custom_fonts[ $font_family_name ] = array(
						'fallback' => 'Verdana, Arial, sans-serif',
						'weights'  => array( '100', '200', '300', '400', '500', '600', '700', '800', '900' ),
					);
				endforeach;
			endif;

			return array_merge( $bb_fonts, $custom_fonts );
		}
	}

	/**
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Custom_Typekit_Fonts_Render::get_instance();

endif;





