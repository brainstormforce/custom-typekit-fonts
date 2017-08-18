(function ($) {

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
        init: function () {
            // Init.
            if ($('.add-new-typekit').length) {
                $('#custom-typekit-font-id').hide();
            } else {
                $('#custom-typekit-font-id').show();
            }

            // Call Tooltip
            $('.custom-typekit-fonts-help').tooltip({
                content: function () {
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
            $(document).delegate(".add-new-typekit", "click", TypekitCustomFonts._add_new_typekit_id);
        },

        /**
         * Get hide kit id and show edit kit id button.
         */
        _add_new_typekit_id: function () {
            $('#custom-typekit-font-id').val('');
            $('#custom-typekit-font-id').show();
            $(this).hide();

        },
    }

    /* Initializes the Bsf Custom Fonts. */
    $(function () {
        TypekitCustomFonts.init();
    });

})(jQuery);