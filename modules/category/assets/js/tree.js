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
        if (msg === '1')
            $('.alert-result').html('<div class="alert alert-success">Lưu thay đổi thành công</div>');
        else
            $('.alert-result').html('<div class="alert alert-danger">Lỗi trong quá trình lưu thay đổi</div>');
    });
}

function createNode(url, parent_id, module) {

    var categoryTitle = prompt("Tên danh mục:", "Nhập tên danh mục mới");
    if (categoryTitle !== null) {
        $.ajax({
            type: "POST",
            url: url,
            data: 'parent_id=' + parent_id + '&module=' + module + '&title=' + categoryTitle
        }).done(function(id) {
            if (id > 0) {
                if ($('#item_'+parent_id+' > ul').length == 0) {
                    $('#item_'+parent_id).append('<ul></ul>');
                }
                $('#item_'+parent_id+' > ul').append('<li id="item_' + id + '"><div><span><i class="fa fa-plus"></i> ' + id + ': ' + categoryTitle + '</span> <button class="btn btn-xs btn-success" onclick="createNode(\'/letyii/cms/admin.php/category/backend/ajax/create.html\', ' + id + ', \'' + module + '\')"><i class="fa fa-plus"></i> </button> <button class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> </button> <button class="btn btn-xs btn-danger" onclick="deleteNode(\'/letyii/cms/admin.php/category/backend/ajax/delete.html\', ' + id + ')"><i class="fa fa-times"></i> </button> </div><ul></ul></li>');
            } else alert ('Có lỗi xảy ra trong quá trình tạo danh mục!');
        });
    }
}

function deleteNode(url, id) {
    if (confirm('Bạn có chắc muốn xóa thư mục này không?')) {
        $.ajax({
            type: "POST",
            url: url,
            data: 'id=' + id
        }).done(function(msg) {
            if (msg === '1') {
                $('#item_' + id).remove();
                $('.alert-result').html('<div class="alert alert-success">Xóa danh mục thành công</div>');
            } else
                $('.alert-result').html('<div class="alert alert-danger">Lỗi trong quá trình xóa danh mục</div>');
        });
    }
}