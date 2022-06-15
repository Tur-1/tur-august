@if ($errors->has($inputName))
<div class="invalid-feedback mt-1 mb-1">
    {{ $errors->first($inputName) }}
</div>
@endif