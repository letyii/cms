//$(function() {
//    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
//    $('.tree li.parent_li > span').on('click', function(e) {
//        var children = $(this).parent('li.parent_li').find(' > ul > li');
//        if (children.is(":visible")) {
//            children.hide('fast');
//            $(this).attr('title', 'Expand this branch').find(' > i').addClass('fa-plus').removeClass('fa-minus');
//        } else {
//            children.show('fast');
//            $(this).attr('title', 'Collapse this branch').find(' > i').addClass('fa-minus').removeClass('fa-plus');
//        }
//        e.stopPropagation();
//    });
//});

var categoryChangedList = new Array();
var categoryChangedListJson = {};

$(document).ready(function() {
    var result;

    // Create tree sortable
    $('.tree').children().nestedSortable({
        handle: 'div',
        listType: 'ul',
        items: 'li',
        toleranceElement: '> div',
        update: function(event, ui) {
            var item = {
                itemId: getValueUi(ui.item.context),
                parentId: getValueUi(ui.item.context.offsetParent),
                afterId: getValueUi(ui.item.context.nextSibling),
                beforeId: getValueUi(ui.item.context.previousSibling)
            };

            categoryChangedList.push(item);
            categoryChangedListJson = JSON.stringify(categoryChangedList);
            $('#categoryChangedListJson').val(categoryChangedListJson);
        }
    });

});

function getValueUi(obj) {
    if (obj === null)
        return '';
    if (obj.id === undefined)
        return '';
    return obj.id.replace('item_', '');
}

function updateList(url) {
    $.ajax({
        type: "POST",
        url: url,
        data: 'data=' + categoryChangedListJson
    }).done(function(msg) {
        $('#result_ajax').html(msg);
    });
}

function deleteNode(url, id) {
    if (confirm('Bạn có chắc muốn xóa thư mục này không?')) {
        $.ajax({
            type: "POST",
            url: url,
            data: 'id=' + id
        }).done(function(msg) {
            $('#result_ajax').html(msg);
        });
    }
}