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

// custom js
import "./data-table.js";
import "./custom-mutiple-select.js";
import { updateSelectedOptions } from "./custom-mutiple-select.js";
import "./script.js";

// toggle columns button
const toggleColumnBtn = document.querySelector(".toggle-columns-button");
const toggleDiv = toggleColumnBtn.querySelector("div");
const columnList = toggleColumnBtn.querySelector(".toggle-columns-list");
toggleDiv.addEventListener("click", () => {
    columnList.classList.toggle("show");
});
// nhấn nút nào ngoài nút toggle columns button đóng toggle column list
document.addEventListener("click", function (event) {
    if (
        !columnList.contains(event.target) &&
        !toggleColumnBtn.contains(event.target)
    ) {
        columnList.classList.remove("show");
    }
});

// custom select bắt sự kiện lọc chi nhánh
document.addEventListener("DOMContentLoaded", function () {
    const customSelect = document.querySelector("#filter-branch-select");
    customSelect.addEventListener("click", function (event) {
        let clickElement = event.target.closest(".option");
        if (clickElement) {
            let sortBranch = updateSelectedOptions(customSelect).join("|");
            roomTypeTable.column(8).search(sortBranch, true, false).draw();
        }
    });
    customSelect.addEventListener("removeTagDone", function (event) {
        let sortBranch = updateSelectedOptions(customSelect).join("|");
        roomTypeTable.column(8).search(sortBranch, true, false).draw();
    });
});
