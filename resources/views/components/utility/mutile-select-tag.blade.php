@props(['branches'])

<div class="custom-select">
    <div class="select-box">
        <input type="text" class="tags-input" name="tags" hidden />
        <div class="selected-options">
        </div>
        <div class="arrow">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="black" width="20" height="20">
                <!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                <path
                    d="M297.4 438.6C309.9 451.1 330.2 451.1 342.7 438.6L502.7 278.6C515.2 266.1 515.2 245.8 502.7 233.3C490.2 220.8 469.9 220.8 457.4 233.3L320 370.7L182.6 233.4C170.1 220.9 149.8 220.9 137.3 233.4C124.8 245.9 124.8 266.2 137.3 278.7L297.3 438.7z" />
            </svg>
        </div>
    </div>
    <div class="options">
        <div class="option all-tags" data-value="All">Select All</div>
        @foreach ($branches as $branch)
            <div class="option" data-value="{{ $branch->id }}">{{$branch->name}}</div>
        @endforeach
        <div class="no-result-message" style="display: none">
            No result match
        </div>
    </div>
    <span class="tag_error_msg error"></span>
</div>
<input type="button" class="button submit-button" value="Lọc" />