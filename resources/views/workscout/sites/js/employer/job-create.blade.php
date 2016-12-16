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

function validateDescription(desc) {
    var re_email = /(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))/;
    var re_phone = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
    if (re_email.test(desc)) {
        alert('Harap hapus email dari deskripsi');
        return false;
    } else if(re_phone.test(desc)) {
        alert('Harap hapus nomor telepon dari deskripsi');
        return false;
    }

    return true;
}

$('#description').focusout(function () {
   validateDescription(this.value);
});

$('#form-job-create').submit(function (e) {
    var desc = jQuery('#description').val();
    if(validateDescription(desc)){
        return true;
    }
    e.preventDefault();
});

</script>

<!--SELECT JS-->

<script src="{{ asset("js") }}/jquery.noconflict.js"></script>

<script src="{{ asset("js") }}/theme-scripts.js"></script>

