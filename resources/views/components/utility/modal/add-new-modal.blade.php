@props(['id', 'item', 'columns', 'branchList'])

{{-- modal add new  --}}
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id . '-label' }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Thêm hạng phòng mới
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route($item . '.store') }}" id="{{ $id . '-form' }}">
                    @csrf
                    @foreach($columns as $column)
                        @continue(in_array($column, ['branch','id']))
                        @continue(Str::endsWith($column, '_id'))

                        @php
                            $type = Schema::getColumnType($item, $column);
                        @endphp

                        @if ($column == "status")
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
                        @else
                            <div class="mb-3 row">
                                <label for="{{ $column }}"
                                    class="col-sm-2 col-md-3 col-lg-4 col-form-label">{{ ucwords(str_replace('_', ' ', $column)) }}</label>
                                <div class="col-sm-10 col-sm-9 col-lg-8">
                                    @if(in_array($type, ['integer', 'bigint', 'decimal', 'float', 'double']))
                                        <input type="number" name="{{ $column }}" class="form-control">
                                    @else
                                        <input type="text" name="{{ $column }}" class="form-control">
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach

                    @if ($item == "room")
                        <x-utility.single-select-tag label="Room Type" name="room_type_id" :list="$attributes->get('selectList')"/>
                        <x-utility.single-select-tag label="Branch" name="branch_id" :list="$branchList"/>
                    @elseif ($item == "room_type")
                        <div class="mb-3 row">
                            <label for="add_branches" class="col-sm-2 col-md-3 col-lg-4 col-form-label">
                                Branch</label>
                            <div class="col-sm-10 col-sm-9 col-lg-8">
                                <x-utility.multiple-select-tag :list="$branchList" name="branch_id" placeholder="Chọn chi nhánh..." />
                            </div>
                        </div>
                    @endif

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