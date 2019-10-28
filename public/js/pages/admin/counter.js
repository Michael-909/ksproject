$(document).ready(function() {
    $('.btn-edit').on('click', function(){
        var id = $(this).attr('data-id');
        $('form#mainForm input[name="id"]').val(id);
        $('form#mainForm').attr('action', 'counter/edit');
        $('form#mainForm').submit();
    });

    $('form#mainForm input[name="keyword"]').on('change', function() {
        goPage(1);
    });
});
