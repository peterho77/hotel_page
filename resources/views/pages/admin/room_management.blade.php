<x-admin-layout>
    <main class="room-type-section | padding-block-600">
        <div class="custom-container">
            <div class="main-content">
                <section class="main-content__left">
                    <div class="side-bar | flow" style="--flow-spacer:1em">
                        <div class="search-bar | box | flow" style="--flow-spacer:1em">
                            <label class="label" for="room-type-search">Tìm kiếm</label>
                            <input type="text" name="room-type-search" placeholder="Tìm kiếm hạng phòng">
                        </div>

                        {{-- custom mutiple select tag --}}
                        <div class="box">
                            <x-utility.multiple-select-tag id="filter-branch-select" :list="$branches"
                                placeholder="Chọn chi nhánh" />
                        </div>

                        <form class="filter-status | box | flow" style="--flow-spacer:1em">
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
                    <nav class="table-toolbar">
                        <div class="nav-wrapper">
                            <div class="filter-search">
                                <span class="label | fs-normal-heading">Hạng phòng & Phòng</span>
                                {{-- code thêm nút search --}}
                            </div>
                            <div class="table-toolbar-buttons">
                                <x-utility.button.add-new-button :tagList="$branches" />
                                <x-utility.button.toggle-column-button :$columns />
                            </div>
                        </div>
                    </nav>

                    {{-- nav tab bootstrap --}}
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('room_type.index') }}"
                                class="nav-link {{ $activeTab === 'roomType' ? 'active' : '' }}" role="tab"
                                aria-selected="{{ $activeTab === 'roomType' ? 'true' : 'false' }}">
                                Hạng phòng
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('room.index') }}"
                                class="nav-link {{ $activeTab === 'room' ? 'active' : '' }}" role="tab"
                                aria-selected="{{ $activeTab === 'room' ? 'true' : 'false' }}">
                                Danh sách phòng
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="nav-tabContent">
                        @if ($activeTab === 'roomType')
                            <div class="tab-pane fade show active" id="nav-room-type" role="tabpanel">
                                <x-utility.data-table id="room-type" :list="$roomTypeList" :$columns />
                            </div>
                        @elseif ($activeTab === 'room')
                            <div class="tab-pane fade show active" id="nav-room" role="tabpanel">
                                <x-utility.data-table id="room" :list="$roomList" :$columns />
                            </div>
                        @endif
                    </div>
                </section>
            </div>

            <div class="modals">
                <x-utility.modal.update-modal :tagList="$branches" />
    
                <x-utility.modal.update-status-modal />
    
                <x-utility.modal.delete-modal />
            </div>
        </div>
    </main>
</x-admin-layout>

<script>
    window.tableColumns = @json($columns);
</script>