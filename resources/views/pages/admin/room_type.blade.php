<x-admin-layout>
    <main class="room-section | padding-block-600">
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
                                        <li>
                                            <svg class="icon" data-size="small">
                                                <use xlink:href="{{asset('icon/admin/filter-buttons.svg#plus')}}">
                                                </use>
                                            </svg>
                                            Hạng phòng
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
                                <button class="button success-button">
                                    <svg class="icon">
                                        <use xlink:href="{{asset('icon/admin/filter-buttons.svg#list')}}">
                                        </use>
                                    </svg>
                                    <svg class="icon" data-size="small">
                                        <use xlink:href="{{asset('icon/guest/caret-down-fill.svg#caret-down-fill')}}">
                                        </use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </nav>
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
                                        <th>Branch</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($room_type_list as $room_type)
                                        <tr>
                                            <td></td>
                                            <td>{{$room_type->name}}</td>
                                            <td>{{$room_type->description}}</td>
                                            <td>{{$room_type->quantity}}</td>
                                            <td>{{$room_type->hourly_rate}}</td>
                                            <td>{{$room_type->full_day_rate}}</td>
                                            <td>{{$room_type->branch_id}}</td>
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