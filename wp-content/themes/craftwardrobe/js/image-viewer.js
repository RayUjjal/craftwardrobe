$(function () {
    $('#image-viewer').hide();
});

$(".images img").click(function () {
    $("#full-image").attr("src", $(this).attr("src"));
    $("#full-image").attr("image_id", $(this).attr("id"));
    $('#image-viewer').show();
});

$("#image-viewer .close").click(function () {
    $('#image-viewer').hide();
});

$(".left-arrow").click(function () {
    var imageId=$("#full-image").attr("image_id").replace("img_","");
    var previousImageId=imageId-1;
    if(previousImageId<=0){
        $("#full-image").attr("src", $("#img_"+totalImages).attr("src"));
        $("#full-image").attr("image_id", $("#img_"+totalImages).attr("id"));
    }
    else{
        $("#full-image").attr("src", $("#img_"+previousImageId).attr("src"));
        $("#full-image").attr("image_id", $("#img_"+previousImageId).attr("id"));
    }
});

$(".right-arrow").click(function () {
    var imageId=$("#full-image").attr("image_id").replace("img_","");
    var nextImageId=parseInt(imageId)+1;
    if(nextImageId>totalImages){
        $("#full-image").attr("src", $("#img_"+1).attr("src"));
        $("#full-image").attr("image_id", $("#img_"+1).attr("id"));
    }
    else{
        $("#full-image").attr("src", $("#img_"+nextImageId).attr("src"));
        $("#full-image").attr("image_id", $("#img_"+nextImageId).attr("id"));
    }    
});

// swipe check
let touchstartX = 0
let touchendX = 0

function checkDirection() {
    if (touchendX < touchstartX) $(".left-arrow").click();
    if (touchendX > touchstartX) $(".right-arrow").click();
}

$('#image-viewer img').on('touchstart', function (e) {
    touchstartX = e.originalEvent.changedTouches[0].screenX;
});

$('#image-viewer img').on('touchend', function (e) {
    touchendX = e.originalEvent.changedTouches[0].screenX;
    checkDirection();
});

function next_image() {

}