
const contactTnc = document.getElementById('contactTnc');
const template_dir = sessionStorage.getItem("template_dir");
const root = sessionStorage.getItem("root");
$("#loader").hide();

contactTnc.addEventListener('change', (event) => {
    if (event.currentTarget.checked) {
        $('#send_message').prop('disabled', false);
    } else {
        $('#send_message').prop('disabled', true);
    }
})


function sendMail() {
    $("#send_message").prop("disabled", true);
    $("#contact_error").text("");
    $("#loader").show();
    if ($("#categories_select").val() == null || $("#categories_select").val() == "categories") {
        $("#contact_error").css("color", "red")
        $("#contact_error").text("*Please Select Category");
        $("#send_message").prop("disabled", false);
        $("#loader").hide();
        return false;
    }

    var attachment = $('#attachment')[0].files.length === 0 ? "" : $('#attachment').prop('files')[0];
    var subject = $("#contact_name").val() + " wants to connect";
    var message = "Name: " + $("#contact_name").val() + "<br>" +
        "Email: " + $("#contact_email").val() + "<br>" +
        "Phone: " + $("#contact_phone").val() + "<br>" +
        "Category: " + $("#categories_select").val() + "<br>" +
        "Message: " + $("#contact_message").val();

    var data = new FormData();
    data.append('message', message);
    data.append('subject', subject);
    data.append('attachment', attachment);
    $.ajax({
        url: root + "/wp-json/craftwardrobe/v1/sendmail/",
        cache: false,
        contentType: false,
        processData: false,
        type: 'post',
        data: data,
        dataType: 'JSON',
        success: function (response) {
            $("#loader").hide();
            if (response.Message == "Success") {
                $('#contact_form')[0].reset();
                $("#contact_error").css("color", "var(--primary-color-1)")
                $("#contact_error").text("*Mail Sent Successfully");
            }
            else {
                $("#contact_error").css("color", "red")
                $("#contact_error").text("*Mail Could Not Send.");
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#loader").hide();
            console.log("AJAX request failed: " + textStatus, errorThrown, jqXHR);
            $('#contact_form')[0].reset();
            $("#contact_error").css("color", "red")
            $("#contact_error").text("*Mail Could Not Send.\n" + jqXHR.status + " : " + textStatus);
        }
    });
    return false;
}

function submitForm(event) {
    event.preventDefault();
}

jQuery(document).ready(function () {
    // $(".popup_container").style.displa="hidden";
    // sessionStorage.setItem("popup", false);
    // const template_url=sessionStorage.getItem("template_url");

    // var form=document.getElementById("contact_form");
    // form.addEventListener('submit', submitForm);

    wardrobe_array.forEach(function (item) {
        const optionObj = document.createElement("option");
        optionObj.textContent = item;
        optionObj.value = item;
        document.getElementById("categories_select").appendChild(optionObj);
    });

    const delay = 3000;
    const intervalId = setInterval(() => {
        console.log("popup display");
        $(".popup_container").removeClass("closePopup");
        $(".image-container").css({
            "height": "100%"
        });
    }, delay);

    setTimeout(() => {
        clearInterval(intervalId);
    }, delay);
    
    $(".close").on("click", () => {
        clearInterval(intervalId);
        $(".popup_container").addClass("closePopup");
    });

});