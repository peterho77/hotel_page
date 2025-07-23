import "./jquery.js";
import "../css/jquery-ui.min.css";
import "./jquery-ui.min.js";
import "./jquery.nice-select.min.js";

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

    // niceselect
    $("select").niceSelect();
});
