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
                                <button class="button success-button">
                                    <svg class="icon" data-size="small">
                                        <use xlink:href="{{asset('icon/admin/filter-buttons.svg#plus')}}">
                                        </use>
                                    </svg>
                                    Thêm mới
                                    <svg class="icon" data-size="small">
                                        <use xlink:href="{{asset('icon/guest/caret-down-fill.svg#caret-down-fill')}}">
                                        </use>
                                    </svg>
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
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011-04-25</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011-07-25</td>
                                        <td>$170,750</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009-01-12</td>
                                        <td>$86,000</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2012-03-29</td>
                                        <td>$433,060</td>
                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>2008-11-28</td>
                                        <td>$162,700</td>
                                    </tr>
                                    <tr>
                                        <td>Brielle Williamson</td>
                                        <td>Integration Specialist</td>
                                        <td>New York</td>
                                        <td>61</td>
                                        <td>2012-12-02</td>
                                        <td>$372,000</td>
                                    </tr>
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