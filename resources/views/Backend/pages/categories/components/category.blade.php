<option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
@include('Backend.pages.categories.components.categories', [
    'categories' => $category['children'],
])
