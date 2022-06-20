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
        <div class="dropdown">
            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm" aria-expanded="false">
                <i class="material-icons md-more_horiz"></i> </a>
            <div class="dropdown-menu" style="margin: 0px;">

                <a href="{{ route('admin.sections.edit', ['section' => $categoriesSection]) }}"
                    class="dropdown-item btn  text-secondary ">
                    Edit
                </a>


                <form class="dropdown-item" onsubmit="return window.confirm('Are you sure')"
                    action="{{ route('admin.sections.destroy', ['section' => $categoriesSection]) }}" method="post">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}


                    <button class="btn text-danger btn-sm w-100 text-start p-0 " type="submit">Delete</button>

                </form>

            </div>
        </div>

    </td>
</tr>
