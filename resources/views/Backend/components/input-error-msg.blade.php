@if ($errors->has($inputName))
    <span class="text-danger mt-2 mb-2">
        {{ $errors->first($inputName) }}
    </span>
@endif
