<!--TEXT EDITOR JS-->

<script src="{{ asset("js") }}/editor.js"></script>

<script src="{{ asset("js") }}/jquery-ui.min.js"></script>

<!--Accordion JS-->

<script src="{{ asset("js") }}/jquery.accordion.js"></script>

<script>
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange : "1970:{{date('Y')}}"
    });

    $('option').mousedown(function(e) {
        e.preventDefault();
        jQuery(this).prop('selected', jQuery(this).prop('selected') ? false : true);
        return false;
    });

</script>

<!--SELECT JS-->

<script src="{{ asset("js") }}/jquery.noconflict.js"></script>

<script src="{{ asset("js") }}/theme-scripts.js"></script>

