<?php
/**
 * White Label Form
 *
 * @package Custom Typekit Fonts
 */

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
						<input type="text" name="ast_white_label[custom-typekit-fonts][name]" class="placeholder placeholder-active" value="<?php echo esc_attr( $settings['custom-typekit-fonts']['name'] ); ?>">
					</label>
				</div>
				<div class="form-field">
					<label><?php _e( 'Plugin Description:', 'custom-typekit-fonts' ); ?>
						<textarea name="ast_white_label[custom-typekit-fonts][description]" class="placeholder placeholder-active" rows="2"><?php echo esc_attr( $settings['custom-typekit-fonts']['description'] ); ?></textarea>
					</label>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</li>
