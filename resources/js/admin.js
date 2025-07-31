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

let room_type_table = new DataTable("#room-type", {
    layout: {
        bottomEnd: {
            paging: {
                firstLast: false,
            },
        },
    },
    columns: [
        {
            className: "dt-control",
            orderable: false,
            data: null,
            defaultContent: "",
        },
        { data: "name" },
        { data: "description" },
        { data: "quantity" },
        { data: "hourly_rate" },
        { data: "full_day_rate" },
        { data: "branch" },
    ],
    order: [[1, "asc"]],
});

function format_str(str) {
    // Tách chuỗi thành mảng các từ (dựa trên dấu gạch dưới)
    let words = str.split('_');
    
    // Duyệt qua từng từ và viết hoa chữ cái đầu
    let capitalizedWords = words.map(word => {
        // Viết hoa chữ cái đầu và giữ nguyên phần còn lại của từ
        return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    });

    // Nối lại các từ thành một chuỗi và trả về kết quả
    return capitalizedWords.join(' ');  // Chuyển các từ thành chuỗi, cách nhau bằng dấu cách
}

// Formatting function for row details - modify as you need
function format(d) {
    // `d` is the original data object for the row
    let detail_infor_list = document.createElement("div");
    detail_infor_list.classList.add("detail-infor-list");
    for (var key in d) {
        detail_infor_list.innerHTML += `
            <div class="detail-item">
                <span class="label">${format_str(key)}: </span>
                <span>${d[key]}</span>
            </div>
        `;
        detail_infor_list.innerHTML += `
            <div class="detail-item">
                <span class="label">${format_str(key)}: </span>
                <span>${d[key]}</span>
            </div>
        `;
    }
    return detail_infor_list;
}

// Add event listener for opening and closing details
room_type_table.on("click", "tbody td.dt-control", function (e) {
    let tr = e.target.closest("tr");
    let row = room_type_table.row(tr);

    if (row.child.isShown()) {
        // This row is already open - close it
        row.child.hide();
    } else {
        // Open this row
        row.child(format(row.data())).show();
    }
});
