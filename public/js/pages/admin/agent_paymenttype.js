$(document).ready(function() {
    $('form#mainForm input.payment-type').on('click', function(){
        var payment_type = $(this).val();
        var available = 0;
        if ($(this).is(':checked')) {
            available = 1;
        }
        $.ajax({
            url: 'payment_type/save',
            type: 'POST',
            data: {
                '_token': $('form#mainForm input[name="_token"]').val(),
                'user_id': $('form#mainForm input[name="user_id"]').val(),
                'payment_type': payment_type,
                'available': available
            },
            dataType: 'json',
            success: function(result) {
                
            }
        });
    });

});
