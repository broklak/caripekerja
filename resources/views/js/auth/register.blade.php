<!--TEXT EDITOR JS-->

<script src="{{ asset("js") }}/editor.js"></script>

<!--JQUERY UI CSS-->

<link href="{{ asset("css") }}/jquery-ui.min.css" rel="stylesheet" type="text/css">

<script src="{{ asset("js") }}/jquery-ui.min.js"></script>

<script>
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true
    });
</script>

<script>
    var chameleon = {
        change: function(event) {
            if(jQuery('#as-pekerja').hasClass("active")) {
                jQuery('#employer-signup').removeClass('hide');
                jQuery('#worker-signup').addClass('hide');
                jQuery('#as-ukm').addClass('active');
                jQuery('#as-pekerja').removeClass('active');
            } else {
                jQuery('#employer-signup').addClass('hide');
                jQuery('#worker-signup').removeClass('hide');
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

<!--SELECT JS-->

<script src="{{ asset("js") }}/jquery.noconflict.js"></script>

<script src="{{ asset("js") }}/theme-scripts.js"></script>

