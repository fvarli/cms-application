$(document).ready(function () {

    $(".sortable").sortable();

    $(".table-container, .image_list_container").on('click', '.btn-remove', function () {

        var $data_url = $(this).data("url");

        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete!"
            }).then(function (result) {
                if (result.value){
                    window.location.href = $data_url;
                }
        })
    })

    $(".table-container, .image_list_container").on('change', '.isActive' ,function () {
       var $data = $(this).prop("checked");
       var $data_url = $(this).data("url");

       if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){
        $.post($data_url, {data: $data}, function (response) {
           // alert(response);
        })
       }
    })

    $(".image_list_container").on('change', '.isCover', function () {
        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){
            $.post($data_url, {data: $data}, function (response) {
                // alert(response);
                $(".sortable").sortable();
            });
        }
    })

    // TODO image_list_container rank update lecture 44
    $(".table-container, .image_list_container").on("sortupdate", '.sortable', function(event, ui){
        var $data = $(this).sortable("serialize");
        var $data_url = $(this).data("url");

        $.post($data_url, {data : $data}, function(response){
        })
    })

    $(".button_usage_btn").change(function () {
        $(".button-information-container").slideToggle();
    })

    // TODO update alert when uploading image lecture 38 - 39 - 40
    var uploadSection = Dropzone.forElement("#dropzone");

    uploadSection.on("complete", function (file) {
     //   console.log(file);
        var $data_url = $("#dropzone").data("url");
        $.post($data_url, {}, function (response) {
            $(".image_list_container").html(response);

            $(".sortable").sortable();
        });
    })

})