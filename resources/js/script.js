import $ from 'jquery';

// page reload
$(window).on("load", function () {
    $(".loader").fadeOut();
    $("#pre-loader").delay(200).fadeOut("slow");
});
