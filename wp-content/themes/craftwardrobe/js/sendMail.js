
const contactTnc = document.getElementById('contactTnc');
const template_dir=sessionStorage.getItem("template_dir");
const root=sessionStorage.getItem("root");

contactTnc.addEventListener('change', (event) => {
    if (event.currentTarget.checked) {
        $('#send_message').prop('disabled', false);
    } else {
        $('#send_message').prop('disabled', true);
    }
})


function sendMail() {
    $("#send_message").prop("disabled", true);
    var subject = $("#contact_name").val() + " wants to connect";
    var message = "Name: " + $("#contact_name").val() + "<br>" +
        "Email: " + $("#contact_email").val() + "<br>" +
        "Phone: " + $("#contact_phone").val() + "<br>" +
        "Message: " + $("#contact_message").val();

    var data = new FormData();
    data.append('message', message);
    data.append('subject', subject);
    $.ajax({
        url: root+"/wp-json/craftwardrobe/v1/sendmail/",
        cache: false,
        contentType: false,
        processData: false,
        type: 'post',
        data: data,
        dataType: 'JSON',
        success: function (response) {
            $("#send_message").prop("disabled", false);
            console.log(response.Message);
            if (response.Message == "Success") {
                $('#contact_form')[0].reset();
                $("#contact_error").css("color", "var(--primary-color-1)")
                $("#contact_error").text("*Mail Sent Successfully");
            }
            else {
                $("#contact_error").css("color", "red")
                $("#contact_error").text("*Mail Could Not Send.");
            }
            
        }
    });
    return false;
}

function submitForm(event){
   event.preventDefault();
}

jQuery(document).ready(function () {
    // $(".popup_container").style.displa="hidden";
    // sessionStorage.setItem("popup", false);
    // const template_url=sessionStorage.getItem("template_url");

    // var form=document.getElementById("contact_form");
    // form.addEventListener('submit', submitForm);

    $(".close").on("click", () => {
        $(".popup_container").addClass("closePopup");
    });

    const delay = 3000; 
    const intervalId = setInterval(()=>{
        console.log("popup display");
        $(".popup_container").removeClass("closePopup");
        $(".image-container").css({
            "height": "100%"
          });
    }, delay);

    setTimeout(() => {
        clearInterval(intervalId);
    }, delay);

});