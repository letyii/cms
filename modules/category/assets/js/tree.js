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

$(document).ready(function() {
    
    $('.tree').children().nestedSortable({
        handle: 'div',
        listType: 'ul',
        items: 'li',
        toleranceElement: '> div',
        update: function( event, ui ) {
            $('#result_item').html('none').html(ui.item.context.id);
            $('#result_parent').html('none').html(ui.item.context.offsetParent.id);
            $('#result_after').html('none').html(ui.item.context.nextSibling.id);
            $('#result_before').html('none').html(ui.item.context.previousSibling.id);
        },
    });
});