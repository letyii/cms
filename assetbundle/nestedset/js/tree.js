var categoryChangedList = new Array();
var categoryChangedListJson = {};

$(document).ready(function() {
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
// Ajax handler update liset category when move category position
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
// Ajax handler create a category
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
                $('#item_'+parent_id+' > ul').append('<li id="item_' + id + '"><div><span><i class="glyphicon glyphicon-plus"></i> ' + id + ': ' + categoryTitle + '</span> <button class="btn btn-xs btn-success" onclick="createNode(\'/letyii/cms/admin.php/category/backend/ajax/create.html\', ' + id + ', \'' + module + '\')"><i class="glyphicon glyphicon-plus"></i> </button> <button class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-pencil"></i> </button> <button class="btn btn-xs btn-danger" onclick="deleteNode(\'/letyii/cms/admin.php/category/backend/ajax/delete.html\', ' + id + ')"><i class="glyphicon glyphicon-trash"></i> </button> </div><ul></ul></li>');
            } else alert ('Có lỗi xảy ra trong quá trình tạo danh mục!');
        });
    }
}
// Ajax handler update a category
function updateNode(url, id, module) {
    var name = $('#item_' + id + ' > div > span').html();
    var categoryTitle = prompt("Nhập tên danh mục mới:", name);
    if (categoryTitle !== null) {
        $.ajax({
            type: "POST",
            url: url,
            data: 'id=' + id + '&title=' + categoryTitle
        }).done(function(id) {
            if (id > 0) {
                $('#item_' + id + ' > div > span').html(categoryTitle);
            } else alert ('Có lỗi xảy ra trong quá trình sửa danh mục!');
        });
    }
}
// Ajax handler delete a category
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