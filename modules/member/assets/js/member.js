// Ajax handler update a role
function updateRole($url, $roleId) {
    var $roleName = prompt("Tên vai trò:", $roleId);
    if ($roleName != null) {
        $.ajax({
            url: $url,
            type: 'POST',           
            dataType: 'JSON',
            data: {
                id: $roleId,
                name: $roleName
            },
            success: function(data) {
                if (data.status === 1) {
                    // ko co ham yiiGirdView.update() nhu Yii 1
                    alert('Cập nhật vai trò thành công');
                    window.location.reload(true);
                } else {
                    $message = '';
                    jQuery.each(data.message, function(key, val) {
                        $message += val + "\n";
                    });
                    alert($message);
                }
            }
        });
    }
}


// Ajax handler create a type
function createItem(url,type) {
    var itemName;
    var description;
    if (type == '2') {
        var moduleName = $('#moduleName').val();
        var permissionName = $('input[name="permissionName"]').val();
        description = $('#permissionDescription').val();
        itemName = moduleName + '.' + permissionName;
        if (permissionName == "") {
            itemName = "";
        }
    } else {
        type = '1';
        itemName = $('input[name="roleName"]').val();
        description = $('#roleDescription').val();
    }
    if (itemName !== null && itemName !== "") {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data: {
                name: itemName,
                description: description,
                type: type
            },
            success: function(data) {
                if (data.status === 1) {
                    // ko co ham yiiGirdView.update() nhu Yii 1
                    alert('Tạo mới thành công');
                    window.location.reload(true);
                } else {
                    $message = '';
                    jQuery.each(data.message, function(key, val) {
                        $message += val + "\n";
                    });
                    alert($message);
                }
            }
        });
    }
}

// Ajax handler delete a item
function deleteItem(url, itemId) {
    if (confirm('Bạn có chắc muốn xóa?')) {
        jQuery.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: itemId
            },
            success: function(data) {
                if (data == 1) {
                    alert('Xóa thành công');
                    window.location.reload(true);
                } else {
                    alert('Có lỗi xảy ra trong quá tình xóa');
                }
            }
        });
    }
}