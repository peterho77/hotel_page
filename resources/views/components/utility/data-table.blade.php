@props(['id', 'list', 'columns'])

<table id="{{ $id }}" class="hover row-border">
    <thead>
        <tr>
            {{-- Cột đầu để mở thông tin chi tiết từng dòng --}}
            <th></th>
            @foreach ($columns as $column)
                @php
                    if (Illuminate\Support\Str::endsWith($column, '_id')) {
                        // Bỏ _id ở cuối
                        $columnName = preg_replace('/_id$/', '', $column);
                    } else {
                        $columnName = $column;
                    }
                @endphp
                <th>{{ ucwords(str_replace('_', ' ', $columnName)) }}</th>
            @endforeach
            <th>Branch</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $item)
            <tr data-id={{ $item->id }}>
                <td></td>
                @foreach ($columns as $column)
                    <td data-cell={{ $column }}>
                        @if (Illuminate\Support\Str::endsWith($column, '_id'))
                            @php
                                $column = preg_replace('/_id$/', '', $column);
                            @endphp
                            {{ $item->$column->name }}
                        @else
                            {{ $item->$column }}
                        @endif
                    </td>
                @endforeach
                <td data-cell="branch">
                    @if($item->branch)
                        {{ $item->branch->name }}
                    @else
                        {{ implode(', ', $item->branches->pluck('name')->toArray()) }}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>