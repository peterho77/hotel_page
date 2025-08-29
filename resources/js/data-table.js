// data table jquery
import DataTable from "datatables.net-dt";
import $ from "jquery";

function bindSearchBarToTables(searchInputSelector, dataTables) {
    $(searchInputSelector).on("keyup", function () {
        const keyword = $(this).val();
        dataTables.forEach((table) => {
            if (table && typeof table.search === "function") {
                table.search(keyword, false, true).draw();
            }
        });
    });
}

function label(str) {
    // Tách chuỗi thành mảng các từ (dựa trên dấu gạch dưới)
    let words = str.replace(/_id$/, "").split("_");

    // Duyệt qua từng từ và viết hoa chữ cái đầu
    let capitalizedWords = words.map((word) => {
        // Viết hoa chữ cái đầu và giữ nguyên phần còn lại của từ
        return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    });

    // Nối lại các từ thành một chuỗi và trả về kết quả
    return capitalizedWords.join(" "); // Chuyển các từ thành chuỗi, cách nhau bằng dấu cách
}

// định dạng lại row detail của data table
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
                    <span class="label">${label(key)}: </span>
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
                ${
                    d.status === "Đang kinh doanh"
                        ? `
                    <button class="button danger-button" data-id="${id}" data-bs-toggle="modal" data-bs-target="#update-room-type-status">
                        <svg class="icon" data-size="small" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 160L256 224L384 224L384 160C384 124.7 355.3 96 320 96C284.7 96 256 124.7 256 160zM192 224L192 160C192 89.3 249.3 32 320 32C390.7 32 448 89.3 448 160L448 224C483.3 224 512 252.7 512 288L512 512C512 547.3 483.3 576 448 576L192 576C156.7 576 128 547.3 128 512L128 288C128 252.7 156.7 224 192 224z"/></svg>
                        <span>Ngừng kinh doanh</span>
                    </button>
                `
                        : ""
                }
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

function bindDetailRowToTables(dataTables) {
    dataTables.forEach((table) => {
        table.on("click", "tbody tr td.dt-control", function (e) {
            let tr = e.target.closest("tr");
            let activeBtn = $(tr).find(".dt-control button");
            let row = table.row(tr);
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
                console.log(row.data());
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
                        $(
                            '#update-room-type form textarea[name="description"]'
                        ).val(row.data().description);
                        $('#update-room-type form input[name="quantity"]').val(
                            parseInt(row.data().quantity)
                        );
                        $(
                            '#update-room-type form input[name="hourly_rate"]'
                        ).val(parseInt(row.data().hourly_rate));
                        $(
                            '#update-room-type form input[name="full_day_rate"]'
                        ).val(parseInt(row.data().full_day_rate));
                        $(
                            '#update-room-type form input[name="overnight_rate"]'
                        ).val(row.data().overnight_rate);
                        $('#update-room-type form select[name="status"]').val(
                            row.data().status
                        );

                        let hasMatch = false;
                        $(
                            "#update-branches.custom-select .options .option"
                        ).each((index, element) => {
                            let optionText = $(element).text().trim();

                            if (
                                row
                                    .data()
                                    .branch.split(",")
                                    .map((item) => item.trim())
                                    .includes(optionText)
                            ) {
                                hasMatch = true;
                                element.classList.add("active");
                            }
                        });
                        if (hasMatch) {
                            updateSelectedOptions(
                                document.querySelector(
                                    "#update-branches.custom-select"
                                )
                            );
                        }
                    }
                );

                //gán action có route và id vào form từ button render từ js
                document
                    .querySelectorAll('button[data-bs-toggle="modal"]')
                    .forEach((button) => {
                        button.addEventListener("click", function () {
                            const id = this.dataset.id;

                            // Gán action vào form
                            document
                                .getElementById("update-room-type")
                                .querySelector("form").action = document
                                .getElementById("update-room-type")
                                .querySelector("form")
                                .action.replace("id", id);

                            document
                                .getElementById("delete-room-type")
                                .querySelector("form").action = document
                                .getElementById("delete-room-type")
                                .querySelector("form")
                                .action.replace("id", id);

                            document
                                .getElementById("update-room-type-status")
                                .querySelector("form").action = document
                                .getElementById("update-room-type-status")
                                .querySelector("form")
                                .action.replace("id", id);
                        });
                    });
            }
        });
    });
}

function bindFilterStatusToTables(filterSelector, dataTables) {
    $(filterSelector).each(function () {
        const item = $(this);
        item.off("change").on("change", function () {
            if (item.val() == "active") {
                dataTables.forEach(table => {
                    let status = findColumnIndexByName(".data-table", "status");
                    table
                    .column(status)
                    .search(item.next().text().trim(), { exact: true })
                    .draw();
                })
            } else if (item.val() == "inactive") {
                dataTables.forEach(table => {
                    let status = findColumnIndexByName(".data-table", "status");
                    table
                    .column(status)
                    .search(item.next().text().trim(), { exact: true })
                    .draw();
                })
            } else {
                dataTables.forEach(table => {
                    let status = findColumnIndexByName(".data-table", "status");
                    table
                    .column(status)
                    .search("")
                    .draw();
                })
            }
        });
    });
}

function findColumnIndexByName(tableSelector, columnName) {
    let columnIndex = -1;

    $(`${tableSelector} thead th`).each(function (index) {
        if ($(this).text().trim().toLowerCase() === columnName.toLowerCase()) {
            columnIndex = index;
        }
    });

    return columnIndex;
}

document.addEventListener("DOMContentLoaded", function () {
    let bladeColumns = window.roomTypeColumns || [];
    let columnKeys = Object.values(bladeColumns);
    let dynamicColumns = columnKeys.map((key) => ({ data: key }));
    console.log(bladeColumns);
    // Thêm nút mở rộng ở cột đầu
    dynamicColumns.unshift({
        className: "dt-control",
        orderable: false,
        data: null,
        defaultContent: "",
        render: function () {
            return '<button class="button success-button"><svg class="icon detail-icon" data-size="small" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/></svg></button>';
        },
        width: "15px",
    });

    dynamicColumns.push({ data: "branch" });

    let roomTypeTable = new DataTable("#room-type", {
        layout: {
            bottomEnd: {
                paging: {
                    firstLast: false,
                },
            },
        },
        select: "single",
        columns: dynamicColumns,
        columnDefs: [
            {
                target: 8,
                visible: false,
                searchable: true,
            },
        ],
        order: [[1, "asc"]],
    });

    let roomTable = new DataTable("#room", {
        layout: {
            bottomEnd: {
                paging: {
                    firstLast: false,
                },
            },
        },
        select: "single",
        columns: dynamicColumns,
        order: [[1, "asc"]],
    });

    // Ví dụ dùng:
    // const index = findColumnIndexByName(roomTable, "status");
    // console.log("Index status:", index);

    const tableId = roomTable;
    console.log(tableId); // 👉 "myTable"

    // ẩn thanh tìm kiếm mặc định của data table
    $(".dt-search").hide();

    // thanh tìm kiếm cho các bảng
    bindSearchBarToTables(".search-bar input", [roomTable, roomTypeTable]);

    // mở đóng chi tiết các dòng
    bindDetailRowToTables([roomTypeTable, roomTable]);

    // ẩn hiện cột
    document.querySelectorAll(".toggle-visible-column").forEach((el) => {
        el.addEventListener("click", function (e) {
            let columnIdx = e.target.getAttribute("data-column");
            let column = roomTypeTable.column(columnIdx);

            // Toggle the visibility
            column.visible(!column.visible());
        });
    });

    // lọc trạng thái hoạt động
    bindFilterStatusToTables(".filter-status .radio-select input", [roomTable, roomTypeTable]);

    $(".filter-status .radio-select input").each(function () {
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
});
