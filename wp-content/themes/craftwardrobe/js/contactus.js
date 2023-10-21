function sendMail() {
    var data = new FormData();
    data.append('senderMail', $('#article_name').val().replace(/,\s*$/, ""));
    data.append('senderPassword', $('#Item_name').find(":selected").text());
    data.append('reciverMail', 'add_article');
    data.append('message', 'add_article');
    data.append('subject', 'add_article');
    $.ajax({
        url: base_url,
        cache: false,
        contentType: false,
        processData: false,
        type: 'post',
        data: data,
        dataType: 'JSON',
        success: function (response) {
            var status = response[0].Status;

            $('#loading_popup').removeClass('is-visible');
            $('#loading_overlay').removeClass('overlay-visible');

            if (status == "Success") {
                $('#success_popup').addClass('is-visible');
                if (response[0].Article_no.length > 0) {
                    $('#message').text(response[0].Article_no + " Already exist.");
                }
                else {
                    $('#message').text("");
                }
            }
        }
    });
}