{{-- modal update room type --}}
<div class="modal fade" id="update-room-type" tabindex="-1" aria-labelledby="update-room-type" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật hạng phòng
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('room_type.update', "id") }}">
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
                        <label for="overnight_rate" class="col-sm-2 col-md-3 col-lg-4 col-form-label">Gía
                            qua
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
                            <x-utility.multiple-select-tag id="update-branches" :list="$attributes->get('tagList')"
                                placeholder="Chọn chi nhánh..." />
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>