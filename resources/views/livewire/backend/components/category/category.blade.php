<option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
@include('livewire.backend.components.category.categories', [
    'categories' => $category['children'],
])
