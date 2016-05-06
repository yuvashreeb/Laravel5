$(document).ready(function () {
    $('#url').focus();
    $('#url').keyup(function () {
    });
});
function go() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});
    var text = $('#url').val();
    $.ajax({
        url: 'shorten',
        type: 'post',
        data: {text: text},
        success: function (data)
        {
             if (data == 'error_no_url') {
                   $('#message').html('<p>No URL specified</p>');
               }
               else{
                   
             if (data == 'error_invalid_url') {
                   $('#message').html('<p>Not a valid URL</p>');
               }
               else{
              if (data == 'error_is_min') {
                   $('#message').html('<p>Already shortened</p>');
               } 
               else{
               if(data == 'not a min'){
                   $('#message').html('<p>Not a correct code</p>');
               }
               
               else 
               {
                   if(!data[0]['Url']){
                   $('#url').val(data);
                   $('#url').select();
                   $('#message').html('<p>Sucessfully shortened your URL</p>');
               }
               else{
                  var link="<a href='"+data[0]['Url']+"'target='_blank'>"+data[0]['Url']+"</a>"
                  $('#message').html(link);
               }
               }
           }
           }
           }
        }
    });
}


