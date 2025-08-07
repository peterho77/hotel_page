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

// lỗi aria-hidden của modal
const modal = document.getElementsByClassName("modal");
Array.from(modal).forEach((item) => {
    item.removeAttribute("aria-hidden");
});

// data table jquery
import DataTable from "datatables.net-dt";

let roomTypeTable = new DataTable("#room-type", {
    layout: {
        bottomEnd: {
            paging: {
                firstLast: false,
            },
        },
    },
    select: "single",
    columns: [
        {
            className: "dt-control",
            orderable: false,
            data: null,
            defaultContent: "",
            render: function () {
                return '<button class="button success-button"><svg class="icon detail-icon" data-size="small" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/></svg></button>';
            },
            width: "15px",
        },
        { data: "name" },
        { data: "description" },
        { data: "quantity" },
        { data: "hourly_rate" },
        { data: "full_day_rate" },
        { data: "overnight_rate" },
        { data: "status" },
        { data: "branch" },
    ],
    columnDefs: [
        {
            target: 8,
            visible: false,
            searchable: false,
        },
    ],
    order: [[1, "asc"]],
});

// Apply the search
// ẩn thanh tìm kiếm mặc định của data table
$(".dt-search").hide();

$(".room-search input").on("keyup", function () {
    roomTypeTable.search($(".room-search input").val(), false, true).draw();
});

function format_str(str) {
    // Tách chuỗi thành mảng các từ (dựa trên dấu gạch dưới)
    let words = str.split("_");

    // Duyệt qua từng từ và viết hoa chữ cái đầu
    let capitalizedWords = words.map((word) => {
        // Viết hoa chữ cái đầu và giữ nguyên phần còn lại của từ
        return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    });

    // Nối lại các từ thành một chuỗi và trả về kết quả
    return capitalizedWords.join(" "); // Chuyển các từ thành chuỗi, cách nhau bằng dấu cách
}

// Format lại row detail của data table
function format(d, id) {
    // `d` is the original data object for the row
    let detailInforList = document.createElement("div");
    detailInforList.classList.add("detail-infor-list");

    //detail content chứa thông tin chi tiết của dữ liệu
    let detailContent = document.createElement("div");
    detailContent.classList.add("detail-content");

    for (var key in d) {
        detailContent.innerHTML += `
            <div class="detail-item">
                <span class="label">${format_str(key)}: </span>
                <span>${d[key]}</span>
            </div>
        `;
    }
    let updateBtn = `
        <div class="update-buttons">
            <button class="button success-button" data-id="${id}" data-bs-toggle="modal" data-bs-target="#update-room-type">
                <svg class="icon" data-size="small" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M530.8 134.1C545.1 144.5 548.3 164.5 537.9 178.8L281.9 530.8C276.4 538.4 267.9 543.1 258.5 543.9C249.1 544.7 240 541.2 233.4 534.6L105.4 406.6C92.9 394.1 92.9 373.8 105.4 361.3C117.9 348.8 138.2 348.8 150.7 361.3L252.2 462.8L486.2 141.1C496.6 126.8 516.6 123.6 530.9 134z"/></svg>
                <span>Cập nhật</span>
            </button>
            <button class="button danger-button" data-id="${id}" data-bs-toggle="modal" data-bs-target="#update-room-type-status">
                <svg class="icon" data-size="small" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 160L256 224L384 224L384 160C384 124.7 355.3 96 320 96C284.7 96 256 124.7 256 160zM192 224L192 160C192 89.3 249.3 32 320 32C390.7 32 448 89.3 448 160L448 224C483.3 224 512 252.7 512 288L512 512C512 547.3 483.3 576 448 576L192 576C156.7 576 128 547.3 128 512L128 288C128 252.7 156.7 224 192 224z"/></svg>
                <span>Ngừng kinh doanh</span>
            </button>
            <button class="button danger-button" data-id="${id}" data-bs-toggle="modal" data-bs-target="#delete-room-type">
                <svg class="icon" data-size="small" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M232.7 69.9L224 96L128 96C110.3 96 96 110.3 96 128C96 145.7 110.3 160 128 160L512 160C529.7 160 544 145.7 544 128C544 110.3 529.7 96 512 96L416 96L407.3 69.9C402.9 56.8 390.7 48 376.9 48L263.1 48C249.3 48 237.1 56.8 232.7 69.9zM512 208L128 208L149.1 531.1C150.7 556.4 171.7 576 197 576L443 576C468.3 576 489.3 556.4 490.9 531.1L512 208z"/></svg>
                <span>Xóa</span>
            </button>
        </div>
    `;
    detailInforList.appendChild(detailContent);
    detailInforList.innerHTML += updateBtn;
    return detailInforList;
}

//gán action có route và id vào form từ button render từ js
document
    .querySelectorAll('button[data-bs-toggle="modal"]')
    .forEach((button) => {
        console.log(button);
        button.addEventListener("click", function () {
            const id = this.dataset.id;

            // Dùng route mẫu rồi thay {id}
            const routeTemplate = "{{ route('room-type.destroy', ':id') }}";
            const finalRoute = routeTemplate.replace(":id", id);

            // Gán action vào form
            document
                .getElementById("delete-room-type")
                .querySelector("form")
                .setAttribute("action", finalRoute);

            document
                .getElementById("update-room-type-status")
                .querySelector("form")
                .setAttribute("action", finalRoute);
        });
    });

// Add event listener for opening and closing details
roomTypeTable.on("click", "tbody tr td.dt-control", function (e) {
    let tr = e.target.closest("tr");
    let activeBtn = $(tr).find(".dt-control button");
    let row = roomTypeTable.row(tr);
    let id = tr.getAttribute("data-id");

    if (row.child.isShown()) {
        // This row is already open - close it
        row.child.hide();
        activeBtn.fadeOut(100, function () {
            activeBtn
                .first()
                .replaceWith(
                    '<button class="button success-button"><svg class="icon detail-icon" data-size="small" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/></svg></button>'
                );
        });
    } else {
        // Open this row
        row.child(format(row.data(), id)).show();
        activeBtn.fadeOut(100, function () {
            activeBtn
                .first()
                .replaceWith(
                    '<button class="button danger-button"><svg class="icon detail-icon" data-size="small" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320z"/></svg></button>'
                );
        });

        $(".detail-infor-list").on(
            "click",
            ".update-buttons button:first-child",
            function () {
                $('#update-room-type form input[name="name"]').val(
                    row.data().name
                );
                $('#update-room-type form textarea[name="description"]').val(
                    row.data().description
                );
                $('#update-room-type form input[name="quantity"]').val(
                    parseInt(row.data().quantity)
                );
                $('#update-room-type form input[name="hourly_rate"]').val(
                    parseInt(row.data().hourly_rate)
                );
                $('#update-room-type form input[name="full_day_rate"]').val(
                    parseInt(row.data().full_day_rate)
                );
                $('#update-room-type form input[name="overnight_rate"]').val(
                    row.data().overnight_rate
                );
                $('#update-room-type form select[name="status"]').val(
                    row.data().status
                );
                let selectedVal = row
                    .data()
                    .branch.split(",")
                    .map((item) => item.trim());
                $("#update_branches").val(selectedVal).trigger("change");
            }
        );
        $("#update-room-type").on("shown.bs.modal", function () {
            let selectedVal = row
                .data()
                .branch.split(",")
                .map((item) => item.trim());

            console.log(selectedVal);

            $('#update-room-type select[name="update_branches[]"] option').each(
                function () {
                    const option = $(this);
                    if (selectedVal.includes(option.val())) {
                        console.log("true");
                        option.prop("selected", true);
                    }
                }
            );
        });

        // Giả sử đây là dữ liệu lấy từ hàng (row) nào đó
        let rowData = {
            branch: "1, 3", // Có thể là dữ liệu từ server hoặc DataTable
        };

        // Khi modal mở xong (sự kiện tự tạo hoặc bạn gắn vào nút mở modal)
        function onModalShown() {
            // Bước 1: Tách dữ liệu thành mảng giá trị
            const selectedValues = rowData.branch
                .split(",")
                .map((item) => item.trim());

            // Bước 2: Lấy thẻ select
            const select = document.getElementById("update_branches");

            // Bước 4: Gán lại selected cho các option khớp
            for (const option of select.options) {
                if (selectedValues.includes(option.value)) {
                    option.selected = true;
                }
            }
        }

        // Gọi hàm này khi modal đã mở xong
        onModalShown(); // hoặc gọi trong sự kiện modal Bootstrap như shown.bs.modal
    }
});

// ẩn hiện cột
document.querySelectorAll(".toggle-visible-column").forEach((el) => {
    el.addEventListener("click", function (e) {
        let columnIdx = e.target.getAttribute("data-column");
        let column = roomTypeTable.column(columnIdx);

        // Toggle the visibility
        column.visible(!column.visible());
    });
});

// multi tag select
var filterBranches = new MultiSelectTag("filter_branches", {
    maxSelection: 5, // default unlimited.
    required: true, // default false.
    placeholder: "Chọn chi nhánh...", // default 'Search'.
    onChange: function (selected) {
        // Callback when selection changes.
        console.log("Selection changed:", selected);
        console.log(selected);
        var selected_id = selected.map((item) => {
            return item.id;
        });
        console.log(selected_id);
        // if (selected) {
        //     for (var item of findObject) {
        //         roomTypeTable.column("8").search(item, { exact: true });
        //     }
        //     roomTypeTable.draw();
        // }
    },
});

var addBranches = new MultiSelectTag("add_branches", {
    maxSelection: 5, // default unlimited.
    required: true, // default false.
    placeholder: "Chọn chi nhánh...", // default 'Search'.
    onChange: function (selected) {
        // Callback when selection changes.
        console.log("Selection changed:", selected);
        console.log(selected);
        var selected_id = selected.map((item) => {
            return item.id;
        });
        console.log(selected_id);
        // if (selected) {
        //     for (var item of findObject) {
        //         roomTypeTable.column("8").search(item, { exact: true });
        //     }
        //     roomTypeTable.draw();
        // }
    },
});

var updateBranches = new MultiSelectTag("update_branches", {
    maxSelection: 5, // default unlimited.
    required: true, // default false.
    placeholder: "Chọn chi nhánh...", // default 'Search'.
    onChange: function (selected) {
        // Callback when selection changes.
        console.log("Selection changed:", selected);
        console.log(selected);
        var selected_id = selected.map((item) => {
            return item.id;
        });
        console.log(selected_id);
        // if (selected) {
        //     for (var item of findObject) {
        //         roomTypeTable.column("8").search(item, { exact: true });
        //     }
        //     roomTypeTable.draw();
        // }
    },
});

// lọc status room type
$(".radio-select input").each(function () {
    const item = $(this);
    item.off("change").on("change", function () {
        if (item.val() == "active") {
            roomTypeTable
                .column("7")
                .search(item.next().text().trim(), { exact: true })
                .draw();
        } else if (item.val() == "inactive") {
            roomTypeTable
                .column("7")
                .search(item.next().text().trim(), { exact: true })
                .draw();
        } else {
            roomTypeTable.column("7").search("").draw();
        }
    });
});
