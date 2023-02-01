jQuery( document ).ready(function($) {
    // Detect menu toggle
    $(document).on('click', '[menu-toggle]', function() {
        ($('nav').attr('toggle') === 'true') ? $('nav').attr('toggle', 'false') : $('nav').attr('toggle', 'true');
    });
});