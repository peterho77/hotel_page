import "./jquery/jquery.js";
import "../css/jquery/jquery-ui.min.css";
import "./jquery/jquery-ui.min.js";
import "./jquery/jquery.nice-select.min.js";
import "./jquery/owl.carousel.min.js";

$(function () {
    // page reload
    $(window).on("load", function () {
        $(".loader").fadeOut();
        $("#pre-loader").delay(200).fadeOut("slow");
    });

    // date picker check in , check out
    $(".date-input").datepicker({
        dateFormat: "dd/mm/yy",
        showAnim: "slideDown",
    });

    var dateFormat = "dd/mm/yy",
        from = $("#date-in")
            .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
            })
            .on("change", function () {
                to.datepicker("option", "minDate", getDate(this));
            }),
        to = $("#date-out")
            .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
            })
            .on("change", function () {
                from.datepicker("option", "maxDate", getDate(this));
            });

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }
        return date;
    }

    // nice select
    $(".nice-select").niceSelect();

    // owl carousel
    $(".hero__slider").owlCarousel({
        loop: true,
        items: 1,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        animateIn: "animate__fadeIn",
        animateOut: "animate__fadeOut",
        autoHeight: false,
    });

    // set background image
    $(".set-bg-img").each(function () {
        var url = $(this).data("set-bg");
        $(this).css("background-image", "url(" + url + ")");
    });
});
