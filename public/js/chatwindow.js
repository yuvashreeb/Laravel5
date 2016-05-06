$(document).ready(function () {

    $("#message").keydown(function (e) {

        if (e.which == '13') {

            var data = $("#message").val();
            
             $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/chatsubmit',
            type: 'post',
            data: {message: data,name:name},
            success: function (data) {
                $("#message").val("");
            }
        });
        }
    });

 function getChat() {

        var word = null;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/getchat',
            type: 'post',
            data: {word: word},
            success: function (data) {

                $('.border').html(data);
            }
        });
    }
    setInterval(function () {
        getChat();
    }, 1000);
});