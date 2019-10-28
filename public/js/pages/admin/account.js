$(document).ready(function() {
    $('.btn-edit').on('click', function(){
        var id = $(this).attr('data-id');
        $('form#mainForm input[name="id"]').val(id);
        $('form#mainForm').attr('action', 'account/edit');
        $('form#mainForm').submit();
    });

    $('form#mainForm input[name="keyword"]').on('change', function() {
        goPage(1);
    });

    $('.btn-role').on('click', function(){
        var id = $(this).attr('data-id');
        $('form#mainForm input[name="id"]').val(id);
        $('form#mainForm').attr('action', 'account/role');
        $('form#mainForm').submit();
    });
});
