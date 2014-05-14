function getListKey(url, q) {
    if(q.trim().length == 0) {
        $('#suggestions').fadeOut();
    } else {
        $.post(url, {queryString: ""+q+""}, function(data) {
            $('#suggestions').fadeIn();
            if (data != '') {
                $('#suggestions').html(data);
            } else {
                $('#suggestions').html('')
            }
        });
    }
}