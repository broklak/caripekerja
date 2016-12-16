<script src="{{ asset("js") }}/jquery-ui.min.js"></script>

<script>
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange : "1970:{{date('Y')}}"
    });
</script>