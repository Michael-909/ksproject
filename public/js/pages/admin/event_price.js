
$(document).ready(function() {
    $('.btn-save').on('click', function(){
        $('input.ticket-type-status').each(function(){
            var input_status = $(this).parent().find('input[name="status[]"]')
            if ($(this).is(':checked')) {
                $(input_status).val(1);
            } else {
                $(input_status).val(0);
            }
        });
        $('form#mainForm').submit();
    });
});
