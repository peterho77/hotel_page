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
                            <label class="label" for="filter_branches">Chi nhánh</label>
                            <form action="{{ route('room_type.show') }}" method="GET" class="flow"
                                style="--flow-spacer:1em">
                                <select name="filter_branches[]" id="filter_branches" multiple>
                                    @php
                                        $selected = collect(session('filter_branches', []));
                                    @endphp
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}" @if($selected->contains($branch->id)) selected
                                        @endif>
                                            {{ $branch->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="button">Lọc</button>
                            </form>
                        </div>
                        <form class="room-status | box | flow" style="--flow-spacer:1em">
                            <label class="label" for="room-status">Trạng thái</label>
                            <div class="radio-select | form-check">
                                <input class="form-check-input" type="radio" name="filter-status" value="active"
                                    id="active-room">
                                <label class="form-check-label" for="filter-status">
                                    Đang kinh doanh
                                </label>
                            </div>
                            <div class="radio-select | form-check">
                                <input class="form-check-input" type="radio" name="filter-status" value="inactive"
                                    id="inactive-room">
                                <label class="form-check-label" for="filter-status">
                                    Ngừng kinh doanh
                                </label>
                            </div>
                            <div class="radio-select | form-check">
                                <input class="form-check-input" type="radio" name="filter-status" value="all"
                                    id="all-room" checked>
                                <label class="form-check-label" for="filter-status">
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
                                {{-- modal bootstrap add new room type --}}
                                <div class="modal fade" id="add-new-room-type" tabindex="-1"
                                    aria-labelledby="add_new-room-type" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm hạng phòng mới
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('room_type.store') }}"
                                                    id="add-new-room-type-form">
                                                    @csrf
                                                    <div class="mb-3 row">
                                                        <label for="name"
                                                            class="col-sm-2 col-md-3 col-lg-4 col-form-label">Tên hạng
                                                            phòng</label>
                                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                                            <input type="text" class="form-control" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="description"
                                                            class="col-sm-2 col-md-3 col-lg-4 col-form-label">
                                                            Mô tả</label>
                                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                                            <textarea class="form-control"
                                                                name="description"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="quantity"
                                                            class="col-sm-2 col-md-3 col-lg-4 col-form-label">
                                                            Số lượng phòng</label>
                                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                                            <input type="number" class="form-control" name="quantity">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="hourly_rate"
                                                            class="col-sm-2 col-md-3 col-lg-4 col-form-label">Giá
                                                            giờ</label>
                                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                                            <input type="number" class="form-control"
                                                                name="hourly_rate">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="full_day_rate"
                                                            class="col-sm-2 col-md-3 col-lg-4 col-form-label">Giá
                                                            ngày</label>
                                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                                            <input type="number" class="form-control"
                                                                name="full_day_rate">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="overnight_rate"
                                                            class="col-sm-2 col-md-3 col-lg-4 col-form-label">Gía qua
                                                            đêm</label>
                                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                                            <input type="number" class="form-control"
                                                                name="overnight_rate">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="status"
                                                            class="col-sm-2 col-md-3 col-lg-4 col-form-label">
                                                            Trạng thái</label>
                                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                                            <select class="form-select" name="status">
                                                                <option value="Đang kinh doanh">
                                                                    Đang kinh doanh
                                                                </option>
                                                                <option value="Ngừng kinh doanh">
                                                                    Ngừng kinh doanh
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="add_branches"
                                                            class="col-sm-2 col-md-3 col-lg-4 col-form-label">
                                                            Chi nhánh</label>
                                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                                            <select id="add_branches" name="add_branches[]" multiple>
                                                                @foreach ($branches as $branch)
                                                                    <option value="{{ $branch->id }}"
                                                                        @selected(old('branch') == $branch)>
                                                                        {{$branch->name}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    {{-- code sau --}}
                                                    {{-- <div class="box form-box | mb-3">
                                                        <div class="form-box__title | padding-block-400">
                                                            <span class="label">Sức chứa</span>
                                                        </div>
                                                        <div class="form-box__content | padding-block-200">
                                                            <div class="my-3 row">
                                                                <label for="standard_capacity"
                                                                    class="col-sm-2 col-md-3 col-form-label">
                                                                    Tiêu chuẩn
                                                                </label>
                                                                <div
                                                                    class="col-sm-10 col-md-9 | row gap-2 align-items-center">
                                                                    <input data-type="small" type="number"
                                                                        class="form-control" name="standard_capacity"
                                                                        min="1" max="4">
                                                                    người lớn và
                                                                    <input data-type="small" type="number"
                                                                        class="form-control" name="standard_capacity"
                                                                        min="0">
                                                                    trẻ em
                                                                </div>
                                                            </div>
                                                            <div class="my-3 row">
                                                                <label for="maximum_capacity"
                                                                    class="col-sm-2 col-md-3 col-form-label">
                                                                    Tối đa</label>
                                                                <div
                                                                    class="col-sm-10 col-md-9 | row gap-2 align-items-center">
                                                                    <input data-type="small" type="number"
                                                                        class="form-control" name="maximum_capacity"
                                                                        min="1" max="4">
                                                                    người lớn và
                                                                    <input data-type="small" type="number"
                                                                        class="form-control" name="maximum_capacity"
                                                                        min="0">
                                                                    trẻ em
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
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
                                        <li class="toggle-visible-column | form-check">
                                            <input class="form-check-input" type="checkbox" name="name" data-column="1"
                                                id="name" checked>
                                            <label class="form-check-label" for="name">
                                                Tên hạng phòng
                                            </label>
                                        </li>
                                        <li class="toggle-visible-column | form-check">
                                            <input class="form-check-input" type="checkbox" name="quantity"
                                                data-column="3" id="quantity" checked>
                                            <label class="form-check-label" for="quantity">
                                                Số lượng phòng
                                            </label>
                                        </li>
                                        <li class="toggle-visible-column | form-check">
                                            <input class="form-check-input" type="checkbox" name="hourly_rate"
                                                data-column="4" id="hourly_rate" checked>
                                            <label class="form-check-label" for="hourly_rate">
                                                Giá giờ
                                            </label>

                                        </li>
                                        <li class="toggle-visible-column | form-check">
                                            <input class="form-check-input" type="checkbox" name="full_day_rate"
                                                data-column="5" id="full_day_rate" checked>
                                            <label class="form-check-label" for="full_day_rate">
                                                Giá cả ngày
                                            </label>
                                        </li>
                                        <li class="toggle-visible-column | form-check">
                                            <input class="form-check-input" type="checkbox" name="overnight_rate"
                                                data-column="6" id="overnight_rate" checked>
                                            <label class="form-check-label" for="overnight_rate">
                                                Giá qua đêm
                                            </label>
                                        </li>
                                        <li class="toggle-visible-column | form-check">
                                            <input class="form-check-input" type="checkbox" name="status"
                                                data-column="7" id="status" checked>
                                            <label class="form-check-label" for="status">
                                                Trạng thái
                                            </label>
                                        </li>
                                        <li class="toggle-visible-column | form-check">
                                            <input class="form-check-input" type="checkbox" name="branch"
                                                data-column="8" id="branch" checked>
                                            <label class="form-check-label" for="branch">
                                                Chi nhánh
                                            </label>
                                        </li>
                                        <li class="toggle-visible-column | form-check">
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
                                        <tr data-id={{ $room_type->id }}>
                                            <td></td>
                                            <td data-cell="name">{{$room_type->name}}</td>
                                            <td data-cell="desciption">{{$room_type->description}}</td>
                                            <td data-cell="quantity">{{$room_type->quantity}}</td>
                                            <td data-cell="hourly_rate">{{$room_type->hourly_rate}}</td>
                                            <td data-cell="full_day_rate">{{$room_type->full_day_rate}}</td>
                                            <td data-cell="overnight_rate">{{$room_type->overnight_rate}}</td>
                                            <td data-cell="status">{{$room_type->status}}</td>
                                            <td data-cell="branch">
                                                {{ implode(', ', $room_type->branches->pluck('name')->toArray()) }}
                                            </td>
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
                {{-- modal update room type --}}
                <div class="modal fade" id="update-room-type" tabindex="-1" aria-labelledby="update-room-type"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật hạng phòng
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('room_type.update', $room_type->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row">
                                        <label for="name" class="col-sm-2 col-md-3 col-lg-4 col-form-label">Tên hạng
                                            phòng</label>
                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="description" class="col-sm-2 col-md-3 col-lg-4 col-form-label">
                                            Mô tả</label>
                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                            <textarea class="form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="quantity" class="col-sm-2 col-md-3 col-lg-4 col-form-label">
                                            Số lượng phòng</label>
                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                            <input type="number" class="form-control" name="quantity">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="hourly_rate" class="col-sm-2 col-md-3 col-lg-4 col-form-label">Giá
                                            giờ</label>
                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                            <input type="number" class="form-control" name="hourly_rate">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="full_day_rate" class="col-sm-2 col-md-3 col-lg-4 col-form-label">Giá
                                            ngày</label>
                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                            <input type="number" class="form-control" name="full_day_rate">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="overnight_rate"
                                            class="col-sm-2 col-md-3 col-lg-4 col-form-label">Gía qua
                                            đêm</label>
                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                            <input type="number" class="form-control" name="overnight_rate">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="status" class="col-sm-2 col-md-3 col-lg-4 col-form-label">
                                            Trạng thái</label>
                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                            <select class="form-select" name="status">
                                                <option value="Đang kinh doanh">
                                                    Đang kinh doanh
                                                </option>
                                                <option value="Ngừng kinh doanh">
                                                    Ngừng kinh doanh
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="update_branches" class="col-sm-2 col-md-3 col-lg-4 col-form-label">
                                            Chi nhánh</label>
                                        <div class="col-sm-10 col-sm-9 col-lg-8">
                                            <select id="update_branches" name="update_branches[]" multiple>
                                                @foreach ($branches as $branch)
                                                    <option value="{{ $branch->id }}">
                                                        {{$branch->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- code sau --}}
                                    {{-- <div class="box form-box | mb-3">
                                                        <div class="form-box__title | padding-block-400">
                                                            <span class="label">Sức chứa</span>
                                                        </div>
                                                        <div class="form-box__content | padding-block-200">
                                                            <div class="my-3 row">
                                                                <label for="standard_capacity"
                                                                    class="col-sm-2 col-md-3 col-form-label">
                                                                    Tiêu chuẩn
                                                                </label>
                                                                <div
                                                                    class="col-sm-10 col-md-9 | row gap-2 align-items-center">
                                                                    <input data-type="small" type="number"
                                                                        class="form-control" name="standard_capacity"
                                                                        min="1" max="4">
                                                                    người lớn và
                                                                    <input data-type="small" type="number"
                                                                        class="form-control" name="standard_capacity"
                                                                        min="0">
                                                                    trẻ em
                                                                </div>
                                                            </div>
                                                            <div class="my-3 row">
                                                                <label for="maximum_capacity"
                                                                    class="col-sm-2 col-md-3 col-form-label">
                                                                    Tối đa</label>
                                                                <div
                                                                    class="col-sm-10 col-md-9 | row gap-2 align-items-center">
                                                                    <input data-type="small" type="number"
                                                                        class="form-control" name="maximum_capacity"
                                                                        min="1" max="4">
                                                                    người lớn và
                                                                    <input data-type="small" type="number"
                                                                        class="form-control" name="maximum_capacity"
                                                                        min="0">
                                                                    trẻ em
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- modal update room type status--}}
                <div class="modal fade" id="update-room-type-status" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Cập nhật trạng thái hạng phòng</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn chắc chắn muốn thay đổi trạng thái hạng phòng không ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('room_type.update_status', $room_type->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn | success-button"><span>Update</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- modal delete room type --}}
            <div class="modal fade" id="delete-room-type" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Xóa hạng phòng</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn chắc chắn muốn xóa hạng phòng này không ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('room_type.destroy', $room_type->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn | danger-button"><span>Delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
</x-admin-layout>

<script>
    const destroyRoute = "{{ route('room_type.destroy', ':id') }}"; // :id sẽ thay bằng JS
</script>