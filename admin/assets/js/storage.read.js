$(document).ready(function() {
    // Make images squared
    $('.storage-img').height($('.storage-img').width());

    // Show modal when image is clicked
    $('.storage-img').each(function() {
        $(this).on('click', function() {
            $('#modal-for-' + $(this).attr('id')).addClass('is-active');
        })
    });

    // Model close button hides modal when clicked
    $('.modal-close').each(function() {
        $(this).on('click', function() {
            $(this).parent().removeClass('is-active');
        });
    });

    // Background shader of modal window will hide modal when clicked
    $('.modal-background').each(function() {
        $(this).on('click', function() {
            $(this).parent().removeClass('is-active');
        });
    });
});
