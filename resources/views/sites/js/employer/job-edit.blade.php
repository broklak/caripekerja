<!--TEXT EDITOR JS-->

<script src="{{ asset("js") }}/editor.js"></script>

<script src="{{ asset("js") }}/jquery-ui.min.js"></script>

<script>

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

