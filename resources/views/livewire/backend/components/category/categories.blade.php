     @foreach ($categories as $category)
         @include('livewire.Backend.components.category.category', [
             'category' => $category,
         ])
     @endforeach
