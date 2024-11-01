jQuery(document).ready(function($){
    $('.zpmpro-cpt-checkbox').click(function(){

        var postTypes = [];

        $('.zpmpro-cpt-checkbox').each(function(){
            if($(this).prop('checked') === true) {
                postTypes.push($(this).val());
            }
            
        });

        var ajaxData = {
            'type'          : 'POST',
            'security'      : zpmpro_ajax.nonce,
            'action'        : 'zpmpro_save_cp_types',
            'postTypes'     : postTypes,
        };

        $('.zpmpro-saving-text').show();
        $('.zpmpro-saved-text').hide();

        $('.zpmpro-ajax-save-option-icon-inner').css({
                'background-color'  : '#ffffff',
                'color'             : '#000000',
                'margin-top'        : '0',
        });

        $('.zpmpro-ajax-save-option-icon').fadeIn();

        $.post(zpmpro_ajax.url, ajaxData, function(response) {

            $('.zpmpro-saving-text').hide();
            $('.zpmpro-saved-text').fadeIn(500);

            $('.zpmpro-ajax-save-option-icon-inner').css({
                'background-color'  : '#12c795',
                'color'             : '#ffffff',
            });                        

            $('.zpmpro-ajax-save-option-icon').delay(750).fadeOut();

        });

    });

});