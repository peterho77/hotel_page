{{-- modal delete room type --}}
<div class="modal fade" id="delete-room-type" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel">
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
                <form action="{{ route('room_type.destroy', "id") }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn | danger-button"><span>Delete</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>