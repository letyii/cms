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
