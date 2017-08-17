(function($){

	/**
	 * Bsf Custom Fonts 
	 *
	 * @class TypekitCustomFonts
	 * @since 1.0.0
	 */

	TypekitCustomFonts = {
		
		/**
		 * Initializes a Bsf Custom Fonts.
		 *
		 * @since 1.0
		 * @method init
		 */ 
		init: function()
		{
			// Init.
			if ( '' == $('#typekit_id').val() ) {
				$('.custom-typekit-fonts-kit-info').hide();
				$('.add-new-typekit').hide();
			}else{
				$('#typekit_id').hide();
				$('.add-new-typekit').show();
			}

			// Call Tooltip
			$('.custom-typekit-fonts-help').tooltip({
				content: function() {
					return $(this).prop('title');
				},
				tooltipClass: 'custom-typekit-fonts-help-ui-tooltip',
				position: {
					my: 'center top',
					at: 'center bottom+10',
				},
				hide: {
					duration: 200,
				},
				show: {
					duration: 200,
				},
			});
			$( document ).delegate( ".get-typekit", "click", TypekitCustomFonts._kit_id_validation );
			$( document ).delegate( ".add-new-typekit", "click", TypekitCustomFonts._add_new_typekit_id );
		},

		/**
		 * Get Fonts Kit.
		 */
		_kit_id_validation: function() {
				var	current = $(this),
					parent = $('.typekit-custom-fonts-wrap'),
				 	typekit_id = $('#typekit_id').val(),
					font_list =  $('.typekit-font-list'),
					table = $('<table><tr><th style="padding-left: 10px;">Fonts</th><th style="padding-left: 10px;">Weights</th></tr></table>'),
					typekit_url = 'https://typekit.com/api/v1/json/kits/' + typekit_id + '/published?callback=?',
					kit_info = $('.custom-typekit-fonts-kit-info'),
					kit_status = $('.ctf-kit-notice');
						current.addClass( 'updating-message' );
						$.ajax({
								url: typekit_url,
								dataType: 'JSON',
							})
							// get response
							.done(function (result) {
								$( '.tcf-notice' ).fadeOut();
								kit_info.hide();
								current.removeClass( 'updating-message' );

								// If got errors in response
								if ( result.errors ) {
									var notice = '<div class="tcf-notice">'+ typekitCustomFonts.message.invalid_id +'</div>'
									parent.before( notice );
									font_list.empty();
								
									setTimeout( function() {
										$( '.tcf-notice' ).fadeOut();
									}, 5000);
								}
								else{
									kit_info.show();
									current.removeClass( 'updating-message' );
									var font_family = [];
									font_list.empty();
									font_list.find( '.kit-list' ).remove();
									result.kit.families.map(function (family) {
							            var variants = family.variations.filter(function (variant) {
							              	return ('i' !== variant.substr(0, 1) );
							              });

							            return {
							              family: family.name,
							              fallback: family.css_stack.replace(/\"/g, ""),
							              weights: variants.map(function(variant) { 
							              		return variant.substr(1, 1) + '00';
							             	}),
							            };
							          }).forEach(function (kitItem) {

							          	font_family.push( { family: kitItem.family,
							          						 fallback:kitItem.fallback,
							          						 weights: kitItem.weights });
							            font_list.append(table).append( '<tr class="kit-list"><td>' + kitItem.family + '</td><td>' + kitItem.weights + '</td></tr>');

							          });

							          // save information into options
							          	var data = {
							          		typekit_id:typekit_id,
											kit_list : font_family,
											action: 'set_typekit_fonts',
											nonce: typekitCustomFonts.ajax_nonce,
										};
							          $.ajax({
											url: ajaxurl,
											type: 'POST',
											data: data,
											success: function(data){
												var notice = '<div class="tcf-notice">' + typekitCustomFonts.message.success +'</div>';
													parent.before( notice );
													$('#typekit_id').hide();
													$('.add-new-typekit').show();
													kit_status.removeClass('ctf-kit-not-active').addClass('ctf-kit-active').text("Active!");
													setTimeout( function() {
														$( '.tcf-notice' ).fadeOut();
													}, 5000);
											}
										});
								}
							})
							.fail(function (e) {
								parent.find( '.tcf-notice' ).remove();
							});
		},

		_add_new_typekit_id: function () {
			$('#typekit_id').val('');
			$('#typekit_id').show();
			$(this).hide();

		},
	}

	/* Initializes the Bsf Custom Fonts. */
	$(function(){
		TypekitCustomFonts.init();
	});

})(jQuery);