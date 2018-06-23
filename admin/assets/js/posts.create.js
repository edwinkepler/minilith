$(document).ready(function() {
    // Init Pell editor
    const editor = pell.init({
        // <HTMLElement>, required
        element: document.getElementById('pell'),

        // <Function>, required
        // Use the output html, triggered by element's `oninput` event
        onChange: html => $('#pell-output').html(html),

        // <string>, optional, default = 'div'
        // Instructs the editor which element to inject via the return key
        defaultParagraphSeparator: 'p',

        // <boolean>, optional, default = false
        // Outputs <span style="font-weight: bold;"></span> instead of <b></b>
        styleWithCSS: false,

        // classes<Array[string]> (optional)
        // Choose your custom class names
        classes: {
            actionbar: 'pell-actionbar',
            button: 'pell-button',
            content: 'pell-content',
            selected: 'pell-button-selected'
        }
    })

    // Set Pells editor content to hidden textarea content
    editor.content.innerHTML = $('#pell-output').text();

    // Notification delete buttons
    $('.delete').each(function() {
        $(this).on('click', function() {
            $(this).parent().fadeOut('fast');
        });
    });

    $('#submit-post-fake').on('click', function() {
        $('#submit-post').click();
    })

    $('#update-post-fake').on('click', function() {
        $('#update-post').click();
    })
});
