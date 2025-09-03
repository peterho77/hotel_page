@props(['columns', 'count' => 0])

<button class="button success-button toggle-columns-button">
    <div>
        <svg class="icon">
            <use xlink:href="{{asset('icon/admin/filter-buttons.svg#list')}}">
            </use>
        </svg>
        <svg class="icon" data-size="small">
            <use xlink:href="{{asset('icon/guest/caret-down-fill.svg#caret-down-fill')}}">
            </use>
        </svg>
    </div>
    <ul class="toggle-columns-list">
        @foreach ($columns as $column)
            @php
                if (Illuminate\Support\Str::endsWith($column, '_id')) {
                    // Bỏ _id ở cuối
                    $columnName = preg_replace('/_id$/', '', $column);
                } else {
                    $columnName = $column;
                }
                $count++;
            @endphp
            <li class="toggle-visible-column | form-check">
                <input class="form-check-input" type="checkbox" name="{{ $columnName }}" data-column="{{ $count }}"
                    id="{{ $columnName }}" checked>
                <label class="form-check-label" for="{{ $columnName }}">
                    {{ ucwords(str_replace('_', ' ', $columnName)) }}
                </label>
            </li>
        @endforeach
    </ul>
</button>

