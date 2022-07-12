 <div class="dropdown dropend">

     <a role="button" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"aria-expanded="false">
         <i class="material-icons md-more_horiz"></i>
     </a>
     <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
         @can('update', $model)
             <li>
                 <a href="{{ $editRoute }}" class="dropdown-item text-secondary">
                     Edit
                 </a>
             </li>
         @endcan
         @can('delete', $model)
             <form class="dropdown-item" onsubmit="return window.confirm('Are you sure')" action="{{ $deleteRoute }}"
                 method="post">
                 {{ method_field('DELETE') }}
                 {{ csrf_field() }}


                 <button class="btn text-danger btn-sm w-100 text-start p-0 " type="submit">Delete</button>

             </form>
         @endcan
     </ul>
 </div>
