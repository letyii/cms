$(document).ready(function() {
    // Check/Uncheck all in list
    $('.checkall').click(function() {
        if ($(this).is(':checked')) {
            $('.checkone').prop('checked', true);
        } else {
            $('.checkone').prop('checked', false);
        }
    });
});

$(document).ready(function() {
    $('.check_all_tree').click(function() {
        if ($(this).is(':checked')) {
            $(this).parent().find('input:checkbox').prop('checked', true);
        }
        else {
            $(this).parent().find('input:checkbox').prop('checked', false);
        }
        updateCheck();
    });
});
function updateCheck() {
    $('input.check_all_tree').change(function() {
        if ($(this).is(':checked')) {
            $(this).closest('ul').siblings('input:checkbox').prop('checked', true).closest('ul').siblings('input:checkbox').prop('checked', true);
        }
    });
}
