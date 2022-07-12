<tr>
    <td>{{ $categoriesSection['id'] }}</td>
    <td>

        <img src="{{ $categoriesSection['image_url'] }}" alt="{{ $categoriesSection['name'] }}" width="70">

    </td>
    <td>
        {{ $categoriesSection['name'] }}
    </td>
    <td>
        --
    </td>
    <td>
        <livewire:backend.components.active-toggle-switch :model="$categoriesSection" field="is_active"
            :wire:key="$categoriesSection->id">
    </td>

    <td>

        @include('Backend.components.policy-dropdown-edit-delete-buttons', [
            'model' => $categoriesSection,
            'editRoute' => route('admin.sections.edit', $categoriesSection),
            'deleteRoute' => route('admin.sections.destroy', $categoriesSection),
        ])
    </td>
</tr>
