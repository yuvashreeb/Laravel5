function like_add(article_id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});

    $.ajax({
        url: 'like_add',
        type: 'post',
        data: {article_id: article_id},
        success: function (data)
        {

            if (data == 'success') {
                like_get(article_id);
            } else {
                $('#danger').html(data);
            }
        }
    });

}
function like_get(article_id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: 'like_get',
        type: 'post',
        data: {article_id: article_id},
        success: function (data)
        {

            $('#article_' + article_id + '_likes').text(data);
        }
    });
}