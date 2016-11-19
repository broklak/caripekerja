<!--TEXT EDITOR JS-->

<script src="{{ asset("js") }}/editor.js"></script>

<script src="{{ asset("js") }}/jquery-ui.min.js"></script>

<script>
//    var dateFormat = "mm/dd/yy",
//            from = $( "#from" )
//                    .datepicker({
//                        defaultDate: "+1w",
//                        changeMonth: true,
//                        numberOfMonths: 1,
//                    })
//                    .on( "change", function() {
//                        to.datepicker( "option", "minDate", "-10" );
//                    }),
//            to = $( "#to" ).datepicker({
//                        defaultDate: "+30d",
//                        changeMonth: true,
//                        numberOfMonths: 1,
//                    })
//                    .on( "change", function() {
//                        from.datepicker( "option", "maxDate", getDate( this ) );
//                    });
//
//    function getDate( element ) {
//        var date;
//        try {
//            date = $.datepicker.parseDate( dateFormat, element.value );
//        } catch( error ) {
//            date = null;
//        }
//
//        return date;
//    }

$("#from").datepicker({
    defaultDate: new Date(),
    minDate: new Date(),
    onSelect: function(dateStr)
    {
        var selectedDate = new Date(dateStr);
        var msecsInADay = 86400000 * 30;
        var endDate = new Date(selectedDate.getTime() + msecsInADay);

        jQuery("#to").datepicker("option",{ minDate: new Date(dateStr)});
        jQuery("#to").datepicker("option",{ maxDate: endDate});
    }
});

$('#to').datepicker({
    defaultDate: new Date(),
    onSelect: function(dateStr) {
        toDate = new Date(dateStr);
    }


});

$('textarea').attr('placeholder', "- Detail Pekerjaan \n- Kualifikasi pekerja yang dicari \n- Fasilitas / Tunjangan yang diberikan \n- Hari dan jam kerja");
</script>

<!--SELECT JS-->

<script src="{{ asset("js") }}/jquery.noconflict.js"></script>

<script src="{{ asset("js") }}/theme-scripts.js"></script>

