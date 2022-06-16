<option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
@include('livewire.Backend.components.category.categories', [
    'categories' => $category['children'],
])
