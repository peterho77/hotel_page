@props(['id' => 'update-status-modal'])

{{-- modal update room type status--}}
<div class="modal fade" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Cập nhật trạng thái hạng phòng</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn chắc chắn muốn thay đổi trạng thái hạng phòng không ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('room_type.status', "id") }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn | success-button"><span>Update</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>