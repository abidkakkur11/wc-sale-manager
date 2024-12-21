jQuery(document).ready(function ($) {
    $('#sale-categories').select2({
        placeholder: 'Select categories (max 5 at a time)',
        maximumSelectionLength: 5,
        width: '100%'
    });
});