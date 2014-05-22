$(document).ready(function() {
    // Check/Uncheck all in list
    $('.checkall').click(function() {
        if ($(this).is(':checked')) {
            $('.checkone').prop('checked', true);
        } else {
            $('.checkone').prop('checked', false);
        }
    });

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

// Delete row
function deleteRow(url, table, id) {
    console.log(url);
    $.ajax({
        url: url,
        data: 'table=' + table + '&id=' + id,
        method: 'POST'
    }).done(function(result) {
        if (result == '1') {
            $('tr[data-key='+id+']').hide();
        }
    });
}