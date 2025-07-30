// bootstrap
import "../css/admin/bootstrap.min.css";
import "./bootstrap.bundle.min.js";

// jquery library css
import "../css/jquery/nice-select.css";
import "../css/jquery/owl.carousel.min.css";
import "animate.css";

// custom css
import "../css/general/reset.css";
import "../css/admin/base.css";
import "../css/admin/style.scss";

// multi-select-tag library
import "../css/admin/multi-select-tag.min.css";
import { MultiSelectTag } from "./multi-select-tag.min.js";

// custom js
import "./script.js";

// multi tag select
var tagSelector = new MultiSelectTag("branches", {
    maxSelection: 5, // default unlimited.
    required: true, // default false.
    placeholder: "Chọn chi nhánh...", // default 'Search'.
    onChange: function (selected) {
        // Callback when selection changes.
        console.log("Selection changed:", selected);
    },
});

// data table jquery
import DataTable from "datatables.net-dt";

DataTable.type("num", "className", "dt-body-right");

new DataTable("#room-type", {
    layout: {
        bottomEnd: {
            paging: {
                firstLast: false,
            },
        },
    },
});
