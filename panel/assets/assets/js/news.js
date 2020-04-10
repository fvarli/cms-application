$(document).ready(function () {

    $(".news_type_select").change(function () {
        if($(this).val() === "image"){

            $(".image_upload_container").fadeIn();
            $(".video_upload_container").hide();

        }else if($(this).val() === "video"){

            $(".video_upload_container").fadeIn();
            $(".image_upload_container").hide();


        }
    })
})