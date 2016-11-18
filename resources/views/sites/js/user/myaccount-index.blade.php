<!--TEXT EDITOR JS-->

<script src="{{ asset("js") }}/editor.js"></script>

<script src="{{ asset("js") }}/jquery-ui.min.js"></script>

<script>
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange : "1970:{{date('Y')}}"
    });
</script>

<!--SELECT JS-->

<script src="{{ asset("js") }}/jquery.noconflict.js"></script>

<script src="{{ asset("js") }}/theme-scripts.js"></script>

