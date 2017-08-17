<?php
/**
 * Custom Typekit fonts Template
 *
 * @package Custom_Typekit_Fonts
 */

$kit_list = get_option( 'custom-typekit-fonts' );
?>
<div class="wrap tco-plugin tco-typekit">
	<h2><?php esc_html_e( 'Typekit', 'custom-typekit-fonts' ); ?></h2>
	<div id="poststuff" >
		<div id="post-body" class="metabox-holder columns-2 typekit-custom-fonts-wrap">
			<div id="post-body-content">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
					<h3 class="hndle"><span><?php esc_html_e( 'Settings', 'custom-typekit-fonts' ); ?></span></h3>
						<table class="form-table typekit-custom-fonts-table">
						<tbody>
							<tr valign="top">
								<th scope="row">
								<label for="typekit_id"> <?php esc_html_e( 'Kit ID:', 'custom-typekit-fonts' ); ?>
									<?php
									if ( isset( $kit_list['kit-id'] ) ) {
									?>
										<span class="ctf-kit-active ctf-kit-notice"><?php echo esc_html__( 'Active!', 'custom-typekit-fonts' ); ?></span>
									<?php } else { ?>
											<span class="ctf-kit-not-active ctf-kit-notice"><?php echo esc_html__( 'Not Active!', 'custom-typekit-fonts' ); ?></span>
									<?php } ?>
								</label>
								 <i class="custom-typekit-fonts-help dashicons dashicons-editor-help" title="<?php echo esc_attr__( 'Please Enter the Valid Kit ID to get the kit details.', 'custom-typekit-fonts' ); ?>"></i>
							</th>
								<td><input type="text" id="typekit_id" value="<?php echo ( isset( $kit_list['kit-id'] ) ) ? esc_attr( $kit_list['kit-id'] ) : ''; ?>">
								<a class="add-new-typekit button" href="#"><?php echo esc_html__( 'Edit Kit ID', 'custom-typekit-fonts' ); ?></a>
								<a class="get-typekit button" href="#"><?php echo esc_html__( 'Refresh', 'custom-typekit-fonts' ); ?></a>
								</td>
							</tr>
							<tr class="custom-typekit-fonts-kit-info" valign="top">
								<th scope="row"><label for="font-list"> <?php esc_html_e( 'Kit Details:', 'custom-typekit-fonts' ); ?> </label>
								<i class="custom-typekit-fonts-help dashicons dashicons-editor-help" title="<?php echo esc_attr__( 'Make sure you have published the kit from Typekit. Only published information is displayed here.', 'custom-typekit-fonts' ); ?>"></i></th>
								<td>
										<table class="typekit-font-list">
										<?php if ( ! empty( $kit_list ) ) { ?> 
											<tr>
												<th style="padding-left: 10px;">
												<?php esc_html_e( 'Fonts', 'custom-typekit-fonts' ); ?> 
												</th>
												<th style="padding-left: 10px;">
												<?php esc_html_e( 'Weights', 'custom-typekit-fonts' ); ?> 
												</th>
											</tr>
												<?php
												foreach ( $kit_list as $key => $fonts ) {
													if ( 'kit-list' == $key ) {
														foreach ( $fonts as $font => $properties ) {
																echo '<tr>';
																echo '<td>' . $font . '</td>';
																echo '<td>';
															$arr = array();
															foreach ( $properties['weights'] as $property ) {
																$arr[] = $property;
															}
															echo join( ',', $arr );
															echo '</td>';
															echo '</tr>';
														}
													}
												}
}
												?>
											</table>
								</td>
							</tr>
						</tbody>
					</table>
					</div>
				</div>
			</div>

			<div id="postbox-container-1" class="postbox-container">
				<div class="meta-box-sortables">
					<div class="postbox">
						<h3 class="hndle"><span><?php esc_html_e( 'Help', 'custom-typekit-fonts' ); ?></span></h3>
						<div class="inside">
							<div class="panel-inner">
							<p> 
							<?php
							/* translators: %1$s: typekit site url. */
							printf( __( 'You can get the Kit ID <a href=%1$s target="_blank" >here</a> from your Typekit Account. <b>Kit ID</b> can be found next to the kit names.', 'custom-typekit-fonts' ) , 'https://typekit.com/account/kits' );
							?>
							</p>

							</div>
						</div>
					</div>
				</div>

				<div class="meta-box-sortables">
					<div class="postbox">
						<h3 class="hndle"><span><?php esc_html_e( 'How it works?', 'custom-typekit-fonts' ); ?></span></h3>
						<div class="inside">
							<div class="panel-inner">
							<p> <?php esc_html_e( 'Once you get the Kit Details, all the fonts will be listed in the customizer under typography', 'custom-typekit-fonts' ); ?>

							</p>
							<a class="submit button button-hero" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php esc_html_e( 'Go To Customizer', 'custom-typekit-fonts' ); ?></a>
							
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
