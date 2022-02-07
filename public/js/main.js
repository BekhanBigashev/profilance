$( document ).ready(function() {
    $("#submit-button").click(
        function(){
            sendAjaxForm('.result', 'shortlink-form', '/shortlinks/');
            return false;
        }
    );
});

function sendAjaxForm(result_block, form, url) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        data: $("#"+form).serialize(),
        success: function(response) {
            link = 'http://127.0.0.1:8000/'+response.shortLink;
            $(result_block).html(link);
            $(result_block).attr('href', link);
        },
        error: function(response) {
            console.log(response)
            $('#error').html(response.responseJSON.errors.link);
        }
    });
}
