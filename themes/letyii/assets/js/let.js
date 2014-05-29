// Check/Uncheck all in list
//$(document).ready(function() {
//    $('.checkall').click(function() {
//        if ($(this).is(':checked')) {
//            $('.checkone').prop('checked', true);
//        } else {
//            $('.checkone').prop('checked', false);
//        }
//    });
//});

// Check list on tree
//$(document).ready(function() {
//    $('.check_all_tree').click(function() {
//        if ($(this).is(':checked')) {
//            $(this).parent().find('input:checkbox').prop('checked', true);
//        }
//        else {
//            $(this).parent().find('input:checkbox').prop('checked', false);
//        }
//        updateCheck();
//    });
//});
//function updateCheck() {
//    $('input.check_all_tree').change(function() {
//        if ($(this).is(':checked')) {
//            $(this).closest('ul').siblings('input:checkbox').prop('checked', true).closest('ul').siblings('input:checkbox').prop('checked', true);
//        }
//    });
//}

// Delete row
function deleteRow(url, table, id) {
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

// Delete selected row
function deleteSelectedRows(url, table) {
    var selectedRows = $('#w0').yiiGridView('getSelectedRows');
    if (selectedRows.length == 0) {
        alert('No selected');
        return false;
    }
    var selectedRowsJson = JSON.stringify(selectedRows);
    $.ajax({
        url: url,
        data: 'table=' + table + '&ids=' + selectedRowsJson,
        method: 'POST'
    }).done(function(result) {
        if (result == '1') {
            selectedRows.forEach(function(id) {
                $('tr[data-key='+id+']').hide();
            });
        }
    });
}