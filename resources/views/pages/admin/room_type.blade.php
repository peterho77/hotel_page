<x-admin-layout>
    <main class="room-type-section | padding-block-600">
        <div class="custom-container">
            <div class="main-content">
                <section class="main-content__left">
                    <div class="side-bar">
                        <div class="room-search | box | flow" style="--flow-spacer:1em">
                            <label class="label" for="room-type-search">Tìm kiếm</label>
                            <input type="text" name="room-type-search" placeholder="Tìm kiếm hạng phòng">
                        </div>
                        <div class="box add-branch-list | flow" style="--flow-spacer:1em">
                            <label class="label" for="branches">Chi nhánh</label>
                            <select name="branches[]" id="branches" multiple>
                                <option value="0" selected>Chi nhánh trung tâm</option>
                                <option value="1">Chi nhánh 1</option>
                                <option value="2">Chi nhánh 2</option>
                            </select>
                        </div>
                        <form class="room-status | box | flow" style="--flow-spacer:1em">
                            <label class="label" for="room-status">Trạng thái</label>
                            <div class="radio-select | form-check">
                                <input class="form-check-input" type="radio" name="status" value="active"
                                    id="active-room">
                                <label class="form-check-label" for="status">
                                    Đang kinh doanh
                                </label>
                            </div>
                            <div class="radio-select | form-check">
                                <input class="form-check-input" type="radio" name="status" value="inactive"
                                    id="inactive-room">
                                <label class="form-check-label" for="status">
                                    Ngừng kinh doanh
                                </label>
                            </div>
                            <div class="radio-select | form-check">
                                <input class="form-check-input" type="radio" name="status" value="all" id="all-room"
                                    checked>
                                <label class="form-check-label" for="status">
                                    Tất cả
                                </label>
                            </div>
                        </form>
                        <section class="record-quantity">
                            <label for="record">Số bản ghi: </label>
                            <select name="record" id="record" class="nice-select">
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                            </select>
                        </section>
                    </div>
                </section>
                <section class="main-content__right | flow" style="--flow-spacer:1em">
                    <nav class="filter-options">
                        <div class="nav-wrapper">
                            <div class="filter-search">
                                <span class="label | fs-normal-heading">Hạng phòng & Phòng</span>
                                {{-- code thêm nút search --}}
                            </div>
                            <div class="filter-buttons">
                                <button class="button success-button add-new-button">
                                    <svg class="icon" data-size="small">
                                        <use xlink:href="{{asset('icon/admin/filter-buttons.svg#plus')}}">
                                        </use>
                                    </svg>
                                    Thêm mới
                                    <svg class="icon" data-size="small">
                                        <use xlink:href="{{asset('icon/guest/caret-down-fill.svg#caret-down-fill')}}">
                                        </use>
                                    </svg>
                                    <ul class="add-new-list">
                                        <li >
                                            <a href="" data-bs-toggle="modal" data-bs-target="#add-new-room-type">
                                                <svg class="icon" data-size="small">
                                                    <use xlink:href="{{asset('icon/admin/filter-buttons.svg#plus')}}">
                                                    </use>
                                                </svg>
                                                Hạng phòng
                                            </a>
                                        </li>
                                        <li>
                                            <svg class="icon" data-size="small">
                                                <use xlink:href="{{asset('icon/admin/filter-buttons.svg#plus')}}">
                                                </use>
                                            </svg>
                                            Phòng
                                        </li>
                                    </ul>
                                </button>
                                {{-- modal add new room type --}}
                                <div class="modal fade" id="add-new-room-type" tabindex="-1" aria-labelledby="add_new-room-type" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm hạng phòng mới</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="button success-button toggle-columns-button">
                                    <div>
                                        <svg class="icon">
                                            <use xlink:href="{{asset('icon/admin/filter-buttons.svg#list')}}">
                                            </use>
                                        </svg>
                                        <svg class="icon" data-size="small">
                                            <use
                                                xlink:href="{{asset('icon/guest/caret-down-fill.svg#caret-down-fill')}}">
                                            </use>
                                        </svg>
                                    </div>
                                    <ul class="toggle-columns-list">
                                        <li class="toggle-item toggle-vis | form-check">
                                            <input class="form-check-input" type="checkbox" name="name" data-column="1"
                                                id="name" checked>
                                            <label class="form-check-label" for="name">
                                                Tên hạng phòng
                                            </label>
                                        </li>
                                        <li class="toggle-item toggle-vis | form-check">
                                            <input class="form-check-input" type="checkbox" name="quantity"
                                                data-column="3" id="quantity" checked>
                                            <label class="form-check-label" for="quantity">
                                                Số lượng phòng
                                            </label>
                                        </li>
                                        <li class="toggle-item toggle-vis | form-check">
                                            <input class="form-check-input" type="checkbox" name="hourly_rate"
                                                data-column="4" id="hourly_rate" checked>
                                            <label class="form-check-label" for="hourly_rate">
                                                Giá giờ
                                            </label>

                                        </li>
                                        <li class="toggle-item toggle-vis | form-check">
                                            <input class="form-check-input" type="checkbox" name="full_day_rate"
                                                data-column="5" id="full_day_rate" checked>
                                            <label class="form-check-label" for="full_day_rate">
                                                Giá cả ngày
                                            </label>
                                        </li>
                                        <li class="toggle-item toggle-vis | form-check">
                                            <input class="form-check-input" type="checkbox" name="overnight_rate"
                                                data-column="6" id="overnight_rate" checked>
                                            <label class="form-check-label" for="overnight_rate">
                                                Giá qua đêm
                                            </label>
                                        </li>
                                        <li class="toggle-item toggle-vis | form-check">
                                            <input class="form-check-input" type="checkbox" name="status"
                                                data-column="7" id="status" checked>
                                            <label class="form-check-label" for="status">
                                                Trạng thái
                                            </label>
                                        </li>
                                        <li class="toggle-item toggle-vis | form-check">
                                            <input class="form-check-input" type="checkbox" name="branch"
                                                data-column="8" id="branch" checked>
                                            <label class="form-check-label" for="branch">
                                                Chi nhánh
                                            </label>
                                        </li>
                                        <li class="toggle-item toggle-vis | form-check">
                                            <input class="form-check-input" type="checkbox" name="img" data-column=""
                                                id="img" checked>
                                            <label class="form-check-label" for="img">
                                                Hình ảnh
                                            </label>
                                        </li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </nav>

                    {{-- nav tab bootstrap --}}
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab">
                            <button class="nav-link active" id="nav-room-type-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-room-type" type="button" role="tab" aria-controls="nav-room-type"
                                aria-selected="true">Hạng phòng
                            </button>
                            <button class="nav-link" id="nav-room-list-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-room-list" type="button" role="tab" aria-controls="nav-room-list"
                                aria-selected="false">Danh sách phòng
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-room-type" role="tabpanel"
                            aria-labelledby="nav-room-type" tabindex="0">

                            {{-- data table --}}
                            <table id="room-type" class="hover row-border">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Hourly Rate</th>
                                        <th>Full Day Rate</th>
                                        <th>Overnight Rate</th>
                                        <th>Status</th>
                                        <th>Branch</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($room_type_list as $room_type)
                                        <tr>
                                            <td></td>
                                            <td data-cell="name">{{$room_type->name}}</td>
                                            <td data-cell="desciption">{{$room_type->description}}</td>
                                            <td data-cell="quantity">{{$room_type->quantity}}</td>
                                            <td data-cell="hourly_rate">{{$room_type->hourly_rate}}</td>
                                            <td data-cell="full_day_rate">{{$room_type->full_day_rate}}</td>
                                            <td data-cell="overnight_rate">{{$room_type->overnight_rate}}</td>
                                            <td data-cell="statud">{{$room_type->status}}</td>
                                            <td data-cell="branch">{{$room_type->branch->name}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-room-list" role="tabpanel" aria-labelledby="nav-room-list"
                            tabindex="0">Bảng 2
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
</x-admin-layout>