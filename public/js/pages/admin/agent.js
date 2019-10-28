$(document).ready(function() {
    $('.btn-edit').on('click', function(){
        var id = $(this).attr('data-id');
        $('form#mainForm input[name="id"]').val(id);
        $('form#mainForm').attr('action', 'agent/edit');
        $('form#mainForm').submit();
    });

    $('form#mainForm input[name="keyword"]').on('change', function() {
        goPage(1);
    });

    $('form#mainForm input[name="account_type[]"]').on('change', function() {
        goPage(1);
    });
    
    $('.btn-paymenttype').on('click', function(){
        var id = $(this).attr('data-id');
        $('form#mainForm input[name="id"]').val(id);
        $('form#mainForm').attr('action', 'agent/payment_type');
        $('form#mainForm').submit();
    });
});
