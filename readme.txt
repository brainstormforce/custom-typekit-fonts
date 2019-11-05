=== Custom Adobe Fonts (Typekit) ===
Contributors: brainstormforce
Donate link: https://www.paypal.me/BrainstormForce
Tags: custom adobe fonts, theme custom fonts, unlimited typekit custom fonts
Requires at least: 4.4
Tested up to: 5.2
Stable tag: 1.0.13
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Custom Adobe Fonts allows you to extends the fonts supports from the Abobe Fonts.

== Description ==

This plugin helps you easily embed adobe fonts easily in your WordPress website.

Currently it works with:

* <a href="https://wpastra.com/?utm_source=wp-repo&utm_campaign=custom-typekit-fonts&utm_medium=description">Astra Theme</a>
* <a href="https://www.wpbeaverbuilder.com/?fla=713">Beaver Builder Theme</a>
* <a href="https://www.wpbeaverbuilder.com/?fla=713">Beaver Builder Plugin</a>
* <a href="https://elementor.com/?ref=1352">Elementor Page Builder</a>

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

= v1.0.13 =
- Fix: Console errors in customizer & frontend on adobe font(TypeKit) selection. 

= v1.0.12 =
- Fix: Load Custom Adobe Fonts (Typekit) menu after Astra Options.
- Fix: Console errors in customizer while selecting font. 

= v1.0.11 =
- Improvement: Allow whitelabel settings to be setup from using constants when using Astra Pro.

= v1.0.10 =
- Fix: Remove typekit font from the Astra Theme's google fonts URL.

= v1.0.9 =
- Improvement: Use CSS embed method for enqueueing TypeKit fonts. This should remove the slight delay in displaying the TypeKit fonts on the page,
- Fix: Post URL in the Block Editor goes behind the Editor Top Bar.

= v1.0.8 =
- Fixed: A few TypeKit fonts not being rendered correctly.

= v1.0.7 =
- Improvement: Enqueue typekit fonts in the block editor.

= v1.0.6 =
- Fixed: Update font name to correct font family to be rendered correctly for all the fonts.
- Fixed: Typekit fonts not rendered ccorrectly in Beaver Builder and Elementor settings.

= v1.0.5 =
- Fixed: Fatal error: Uncaught Error: Class ‘Bsf_Custom_Fonts_Taxonomy’ not found

= v1.0.4 =
- Fixed: Added Fonts in separate group for Elementor fonts & global fonts selection.

= v1.0.3 =
- New: Added compatibility with Beaver Builder Theme, Beaver Builder Plugin and Elementor.

= v1.0.2 =
- Typekit fonts support added for all themes.
- White Label support added from the [Astra Pro](https://wpastra.com/pro/) plugin.

= v1.0.1 =
- Custom Typekit Fonts wp admin menu renamed to Typekit Fonts.
- Empty Kit notice added if there is not fonts in the Kit.
- Php waring if there is no font list handled.

= v1.0.0 =
- Initial release
