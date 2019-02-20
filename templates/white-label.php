<?php
/**
 * White Label Form
 *
 * @package Custom Typekit Fonts
 */

?>
<?php
// Bail from displaying settings screen if Astra Pro is older version.
if ( ! is_callable( 'Astra_Ext_White_Label_Markup::branding_key_to_constant' ) ) {
	return;
}
?>
<li>
	<div class="branding-form postbox">
		<button type="button" class="handlediv button-link" aria-expanded="true">
			<span class="screen-reader-text"><?php _e( 'Custom Typekit Fonts Branding', 'custom-typekit-fonts' ); ?></span>
			<span class="toggle-indicator" aria-hidden="true"></span>
		</button>

		<h2 class="hndle ui-sortable-handle">
			<span><?php _e( 'Custom Typekit Fonts Branding', 'custom-typekit-fonts' ); ?></span>
		</h2>

		<div class="inside">
			<div class="form-wrap">
				<div class="form-field">
					<label><?php _e( 'Plugin Name:', 'custom-typekit-fonts' ); ?>
						<input type="text" name="ast_white_label[custom-typekit-fonts][name]" class="placeholder placeholder-active" <?php disabled( defined( Astra_Ext_White_Label_Markup::branding_key_to_constant( 'custom-typekit-fonts', 'name' ) ), true, true ); ?> value="<?php echo esc_attr( Astra_Ext_White_Label_Markup::get_whitelabel_string( 'custom-typekit-fonts', 'name' ) ); ?>">
					</label>
				</div>
				<div class="form-field">
					<label><?php _e( 'Plugin Description:', 'custom-typekit-fonts' ); ?>
						<textarea name="ast_white_label[custom-typekit-fonts][description]" class="placeholder placeholder-active" <?php disabled( defined( Astra_Ext_White_Label_Markup::branding_key_to_constant( 'custom-typekit-fonts', 'description' ) ), true, true ); ?> rows="2"><?php echo esc_attr( Astra_Ext_White_Label_Markup::get_whitelabel_string( 'custom-typekit-fonts', 'description' ) ); ?></textarea>
					</label>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</li>
