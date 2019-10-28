function goPage(page) {
    $('form#mainForm input[name="page"]').val(page);
    $('form#mainForm').attr('action', '');
    $('form#mainForm').submit();
}
$(document).ready(function() {
    $('form#mainForm select[name="rows"]').on('change', function() {
        goPage(1);
    });

    $('.page-link').on('click', function() {
        page = $(this).attr('data-page');
        goPage(page);
    });
});
