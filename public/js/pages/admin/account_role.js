$(document).ready(function() {
    $('form#mainForm select.role-level').on('change', function(){
        var role_id = $(this).attr('data-role');
        var level = $(this).val();
        $.ajax({
            url: 'role/save',
            type: 'POST',
            data: {
                '_token': $('form#mainForm input[name="_token"]').val(),
                'user_id': $('form#mainForm input[name="user_id"]').val(),
                'role_id': role_id,
                'level': level
            },
            dataType: 'json',
            success: function(result) {
                
            }
        });
    });

});
