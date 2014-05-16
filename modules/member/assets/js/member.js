// Ajax handler create a role
function createRole($url) {

    var $roleName = prompt("Tên vai trò:", "Nhập tên vai trò mới");
    if ($roleName != null) {
        $.ajax({
            url: $url,
            type: 'POST',           
            dataType: 'JSON',
            data: {
                name: $roleName
            },
            success: function(data) {
                if (data.status === 1) {
                    // ko co ham yiiGirdView.update() nhu Yii 1
                    alert('Tạo mới vai trò thành công');
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
// Ajax handler delete a role
function deleteRole($url, $roleId) {
    if (confirm('Bạn có chắc muốn xóa?')) {
        jQuery.ajax({
            url: $url,
            type: 'POST',            
            data: {
                id: $roleId
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

