     @foreach ($categories as $category)
         @include('Backend.pages.categories.components.category', [
             'category' => $category,
         ])
     @endforeach
