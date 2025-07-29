import "./bootstrap.js";
import "bootstrap/dist/css/bootstrap.min.css";

// css
import "../css/jquery/nice-select.css";
import "../css/jquery/owl.carousel.min.css";
import "animate.css";
import "../css/general/reset.css";
import "../css/admin/base.css";
import "../css/admin/style.scss";
import "../css/admin/multi-select-tag.min.css";

// js
import {MultiSelectTag} from "./multi-select-tag.min.js";
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
