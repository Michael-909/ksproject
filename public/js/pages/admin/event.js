
$(document).ready(function() {
    $('.btn-edit').on('click', function(){
        var id = $(this).attr('data-id');
        $('form#mainForm input[name="id"]').val(id);
        $('form#mainForm').attr('action', 'event/edit');
        $('form#mainForm').submit();
    });

    $('form#mainForm input[name="keyword"]').on('change', function() {
        goPage(1);
    });

    $('.btn-price').on('click', function(){
        var event_id = $(this).attr('data-event-id');
        $('form#mainForm input[name="event_id"]').val(event_id);
        $('form#mainForm').attr('action', 'event/price');
        $('form#mainForm').submit();
    });
    $('.btn-show').on('click', function(){
        var event_id = $(this).attr('data-event-id');
        $('form#mainForm input[name="event_id"]').val(event_id);
        $('form#mainForm').attr('action', 'show/list');
        $('form#mainForm').submit();
    });
});
