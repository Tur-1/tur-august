     @foreach ($categories as $category)
         @include('livewire.backend.components.category.category', [
             'category' => $category,
         ])
     @endforeach
