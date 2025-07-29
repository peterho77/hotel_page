<x-admin-layout>
    <main class="room main-content | padding-block-600">
        <div class="container">
            <section class="main-content__left">
                <div class="side-bar">
                    <div class="room-search | box | flow" style="--flow-spacer:1em">
                        <label for="room-type-search">Tìm kiếm</label>
                        <input type="text" name="room-type-search" placeholder="Tìm kiếm hạng phòng">
                    </div>
                    <div class="box add-branch-list | flow" style="--flow-spacer:1em">
                        <label for="branches">Chi nhánh</label>
                        <select name="branches[]" id="branches" multiple>
                            <option value="0" selected>Chi nhánh trung tâm</option>
                            <option value="1">Chi nhánh 1</option>
                            <option value="2">Chi nhánh 2</option>
                        </select>
                    </div>
                    <form class="room-status | box | flow" style="--flow-spacer:1em">
                        <label for="room-status">Trạng thái</label>
                        <div class="radio-select | form-check">
                            <input class="form-check-input" type="radio" name="status" value="active" id="active-room">
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
            <section class="main__right">

            </section>
        </div>
    </main>
</x-admin-layout>