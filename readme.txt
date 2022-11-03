=== Custom Adobe Fonts (Typekit) ===
Contributors: brainstormforce
Donate link: https://www.paypal.me/BrainstormForce
Tags: custom adobe fonts, theme custom fonts, unlimited typekit custom fonts
Requires at least: 4.4
Tested up to: 6.1
Stable tag: 1.0.18
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Custom Adobe Fonts allows you to extends the fonts supports from the Abobe Fonts.

== Description ==

This plugin helps you easily embed adobe fonts easily in your WordPress website.

Currently it works with:

* <a href="https://wpastra.com/?utm_source=wp-repo&utm_campaign=custom-typekit-fonts&utm_medium=description">Astra Theme</a>
* <a href="https://www.wpbeaverbuilder.com/">Beaver Builder Theme</a>
* <a href="https://www.wpbeaverbuilder.com/">Beaver Builder Plugin</a>
* <a href="https://elementor.com/">Elementor Page Builder</a>

How does it work?

1. Install the plugin
2. Enter the Project ID that you create in adobe fonts.
3. And done. You will be able to see the fonts added in the settings of Astra / Beaver Builder / Elementor. Please refer screenshots.

If you're not using any of the supported plugins and theme, you can write the custom CSS to apply the fonts.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/custom-typekit-fonts` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the Appearance -> Adobe Fonts -> Add Kit ID and get all Font list.
4. If you are using [Astra](https://wpastra.com) then start using fonts from the customizer.
5. You can also select Font Family from Appearance -> Adobe Fonts and start using it into your custom CSS.

== Screenshots ==

1. Get your Project ID
2. Enter your Project ID
3. Get all published kit details from your Adobe ID
4. Select any Adobe font from Astra Theme Customizer
5. Select any Adobe font from Elementor
6. Select any Adobe font from Beaver Builder
7. Select any Adobe font from Beaver Builder Theme Customizer

== Changelog ==

= 1.0.18 =
- Fix: Fixed compatibility with other plugins with respect to the admin notice.

= 1.0.17 =
- New: Users can now share non-personal usage data to help us test and develop better products. ( https://store.brainstormforce.com/usage-tracking/?utm_source=wp_dashboard&utm_medium=general_settings&utm_campaign=usage_tracking )
- Fix: "PHP Notice: Trying to access array offset on value of type bool" when user is migrating from 1.0.8 or lower version.

= 1.0.16 =
- Improvement: Updated warning strings incase of wrong project ID.

= 1.0.15 =
- Fix: Settings page's sections showing markup instead of content.

= 1.0.14 =
- Improvement: Hardened the security of plugin
- Improvement: Compatibility with latest WordPress PHP_CodeSniffer rules

= 1.0.13 =
- Fix: Console errors in customizer & frontend on adobe font(TypeKit) selection.

= 1.0.12 =
- Fix: Load Custom Adobe Fonts (Typekit) menu after Astra Options.
- Fix: Console errors in customizer while selecting font.

= 1.0.11 =
- Improvement: Allow whitelabel settings to be setup from using constants when using Astra Pro.

= 1.0.10 =
- Fix: Remove typekit font from the Astra Theme's google fonts URL.

= 1.0.9 =
- Improvement: Use CSS embed method for enqueueing TypeKit fonts. This should remove the slight delay in displaying the TypeKit fonts on the page,
- Fix: Post URL in the Block Editor goes behind the Editor Top Bar.

= 1.0.8 =
- Fixed: A few TypeKit fonts not being rendered correctly.

= 1.0.7 =
- Improvement: Enqueue typekit fonts in the block editor.

= 1.0.6 =
- Fixed: Update font name to correct font family to be rendered correctly for all the fonts.
- Fixed: Typekit fonts not rendered ccorrectly in Beaver Builder and Elementor settings.

= 1.0.5 =
- Fixed: Fatal error: Uncaught Error: Class ‘Bsf_Custom_Fonts_Taxonomy’ not found

= 1.0.4 =
- Fixed: Added Fonts in separate group for Elementor fonts & global fonts selection.

= 1.0.3 =
- New: Added compatibility with Beaver Builder Theme, Beaver Builder Plugin and Elementor.

= 1.0.2 =
- Typekit fonts support added for all themes.
- White Label support added from the [Astra Pro](https://wpastra.com/pro/) plugin.

= 1.0.1 =
- Custom Typekit Fonts wp admin menu renamed to Typekit Fonts.
- Empty Kit notice added if there is not fonts in the Kit.
- Php waring if there is no font list handled.

= 1.0.0 =
- Initial release
