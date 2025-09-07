@props(['label', 'name','list'])

<div class="mb-3 row">
    <label for="{{ $name }}" class="col-sm-2 col-md-3 col-lg-4 col-form-label">
        {{$label}}</label>
    <div class="col-sm-10 col-sm-9 col-lg-8">
        <select class="form-select" name="{{ $name }}">
            @foreach ($list as $item)
                <option value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>