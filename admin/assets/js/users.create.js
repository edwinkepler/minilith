$(document).ready(function() {
    // Notification delete buttons
    $('.delete').each(function() {
        $(this).on('click', function() {
            $(this).parent().fadeOut('fast');
        });
    });

    $('#submit-user-fake').on('click', function() {
        $('#submit-user').click();
    })

    $('#update-user-fake').on('click', function() {
        $('#update-user').click();
    })
});
