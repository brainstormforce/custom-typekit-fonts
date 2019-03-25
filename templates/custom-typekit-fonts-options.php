<?php
/**
 * Custom Typekit fonts Template
 *
 * @package Custom_Typekit_Fonts
 */

$kit_info = get_option( 'custom-typekit-fonts' );
?>
<div class="wrap">
	<h2><?php echo esc_html( apply_filters( 'custom_typekit_fonts_menu_title', __( 'Adobe Fonts', 'custom-typekit-fonts' ) ) ); ?></h2>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2 typekit-custom-fonts-wrap">
			<div id="post-body-content">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<h3 class="hndle"><span><?php esc_html_e( 'Settings', 'custom-typekit-fonts' ); ?></span></h3>
						<form name="custom-typekit-fonts-form" method="post" action="">
							<table class="form-table typekit-custom-fonts-table">
								<tbody>
								<tr valign="top">
									<th scope="row">
										<label
											for="typekit_id"> <?php esc_html_e( 'Project ID:', 'custom-typekit-fonts' ); ?>
										</label>
										<i class="custom-typekit-fonts-help dashicons dashicons-editor-help"
										title="<?php echo esc_attr__( 'Please Enter the Valid Project ID to get the kit details.', 'custom-typekit-fonts' ); ?>"></i>
									</th>
									<td><input
											style="display:<?php echo esc_attr( empty( $kit_info['custom-typekit-font-details'] ) ? 'inline-block' : 'none' ); ?>"
											type="text" name="custom-typekit-font-id" id="custom-typekit-font-id"
											value="<?php echo ( isset( $kit_info['custom-typekit-font-id'] ) ) ? esc_attr( $kit_info['custom-typekit-font-id'] ) : ''; ?>">
										<?php if ( ! empty( $kit_info['custom-typekit-font-details'] ) ) : ?>
											<a class="add-new-typekit button button-large"
											href="#"><?php echo esc_html__( 'Edit Project ID', 'custom-typekit-fonts' ); ?></a>
										<?php endif; ?>

										<?php
										$btn = __( 'Refresh', 'custom-typekit-fonts' );
										if ( empty( $kit_info['custom-typekit-font-id'] ) || empty( $kit_info['custom-typekit-font-details'] ) ) {
											$btn = __( 'Save', 'custom-typekit-fonts' );
										}
										?>
										<input id="submit" class="button button-large" type="submit"
											value=" <?php echo esc_attr( $btn ); ?> ">
									</td>
								</tr>

								<?php if ( ! empty( $kit_info['custom-typekit-font-details'] ) ) : ?>
									<tr>
										<th>
											<label
												for="font-list"> <?php esc_html_e( 'Kit Details:', 'custom-typekit-fonts' ); ?> </label>
											<i class="custom-typekit-fonts-help dashicons dashicons-editor-help"
											title="<?php echo esc_attr__( 'Make sure you have published the kit from Typekit. Only published information is displayed here.', 'custom-typekit-fonts' ); ?>"></i>
										</th>
										<td>
											<table class="typekit-font-list">
												<tr>
													<th>
														<?php esc_html_e( 'Fonts', 'custom-typekit-fonts' ); ?>
													</th>
													<th>
														<?php esc_html_e( 'Font Family', 'custom-typekit-fonts' ); ?>
													</th>
													<th>
														<?php esc_html_e( 'Weights', 'custom-typekit-fonts' ); ?>
													</th>
												</tr>
												<?php

												foreach ( $kit_info['custom-typekit-font-details'] as $font ) :

													echo '<tr>';
													echo '<td>' . $font['family'] . '</td>';
													echo '<td>' . $font['fallback'] . '</td>';
													echo '<td>';
													$comma_sep_arr = array();
													foreach ( $font['weights'] as $weight ) :
														$comma_sep_arr[] = $weight;
													endforeach;
													echo join( ', ', $comma_sep_arr );
													echo '</td>';
													echo '</tr>';

												endforeach;

												?>
											</table>
										</td>
									</tr>
								<?php endif; ?>
								</tbody>
							</table>

							<?php wp_nonce_field( 'custom-typekit-fonts', 'custom-typekit-fonts-nonce' ); ?>
							<input name="custom-typekit-fonts-submitted" type="hidden" value="submitted">

						</form>
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
									printf( __( 'You can get the Project ID <a href=%1$s target="_blank" >here</a> from your Typekit Account. <b>Project ID</b> can be found next to the kit names.', 'custom-typekit-fonts' ), 'https://fonts.adobe.com/my_fonts?browse_mode=all#web_projects-section' );
									?>
								</p>

							</div>
						</div>
					</div>
				</div>

				<div class="meta-box-sortables">
					<div class="postbox">
						<h3 class="hndle"><span><?php esc_html_e( 'How it works?', 'custom-typekit-fonts' ); ?></span>
						</h3>
						<div class="inside">
							<div class="panel-inner">
								<p> 
								<?php
									/* translators: %1$s: Astra Theme url. */
									printf( __( '1) Once you get the Kit Details, all the fonts will be listed in the customizer under typography for only <a href="%1$s" target="_blank" rel="noopener"> Astra </a> WordPress Theme users', 'custom-typekit-fonts' ), 'https://wpastra.com' );
								?>
								</p>
								<p>
									<?php esc_html_e( '2) Select the Font Family and start using it into your custom CSS.', 'custom-typekit-fonts' ); ?>
								</p>
								<a class="submit button button-hero"
								href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php esc_html_e( 'Go To Customizer', 'custom-typekit-fonts' ); ?></a>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
