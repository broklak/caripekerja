<script>
    var chameleon = {
        change: function(event) {
            if(jQuery('#as-pekerja').hasClass("active")) {
                jQuery('#employer-login').removeClass('hide');
                jQuery('#worker-login').addClass('hide');
                jQuery('#as-ukm').addClass('active');
                jQuery('#as-pekerja').removeClass('active');
            } else {
                jQuery('#employer-login').addClass('hide');
                jQuery('#worker-login').removeClass('hide');
                jQuery('#as-pekerja').addClass('active');
                jQuery('#as-ukm').removeClass('active');
            }
        },
        setup: function() {
            jQuery(document).on('click', '.li-click',
                    chameleon.change);
        }
    };

    jQuery(chameleon.setup);
</script>