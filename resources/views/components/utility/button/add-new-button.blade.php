@props(['newList'])

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
        @foreach ($newList as $newItem)
            <li>
                <a href="" data-bs-toggle="modal" data-bs-target="{{ '#add-new-' . $newItem }}">
                    <svg class="icon" data-size="small">
                        <use xlink:href="{{asset('icon/admin/filter-buttons.svg#plus')}}">
                        </use>
                    </svg>
                    {{ucwords(str_replace('_', ' ', $newItem))}}
                </a>
            </li>
        @endforeach
    </ul>
</button>
@foreach ($newList as $newItem)
    @php
        $modalColumns = Illuminate\Support\Facades\Schema::getColumnListing($newItem);
    @endphp
    <x-utility.modal.add-new-modal :id="'add-new-' . $newItem" :item="$newItem" :columns="$modalColumns"
        :branchList="$attributes->get('branchList')" :selectList="$attributes->get('selectList')"/>
@endforeach