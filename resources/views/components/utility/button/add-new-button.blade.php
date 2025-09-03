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
            <a href="" data-bs-toggle="modal" data-bs-target="#add-new-room">
                <svg class="icon" data-size="small">
                    <use xlink:href="{{asset('icon/admin/filter-buttons.svg#plus')}}">
                    </use>
                </svg>
                Phòng
            </a>
        </li>
    </ul>
</button>
<x-utility.modal.add-new-modal :tagList="$attributes->get('tagList')"/>