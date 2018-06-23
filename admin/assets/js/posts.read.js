$(document).ready(function() {
    $('.modal-trigger').each(function() {
        $(this).on('click', function(e) {
            e.preventDefault();
            $('#delete-' + $(this).attr('id')).addClass('is-active');
            var modal = $('#delete-' + $(this).attr('id'));
            modal.find('.modal-background').on('click', function() {
                modal.removeClass('is-active');
            });
            modal.find('.modal-button-no').on('click', function() {
                modal.removeClass('is-active');
            });
        });
    });
});
