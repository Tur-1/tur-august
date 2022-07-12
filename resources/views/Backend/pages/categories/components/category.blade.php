<tr>
    <td>{{ $category->id }}</td>
    <td>

        <img src="{{ $category->image_url }}" alt="{{ $category->name }}" width="70">

    </td>
    <td>
        {{ $category->name }}
    </td>
    <td>
        {{ $sectioName }}
    </td>
    <td>
        <livewire:backend.components.active-toggle-switch :model="$category" field="is_active" :wire:key="$category->id">
    </td>
    <td>
        @include('Backend.components.policy-dropdown-edit-delete-buttons', [
            'model' => $category,
            'editRoute' => route('admin.categories.edit', $category),
            'deleteRoute' => route('admin.categories.destroy', $category),
        ])

    </td>
</tr>

@include('Backend.pages.categories.components.categories', [
    'categories' => $category['children'],
])
