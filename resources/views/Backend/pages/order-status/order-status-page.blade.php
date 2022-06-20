@extends('Backend.layouts.master')
@section('title', 'order status')

@section('content')
    <div class="content-header">

        <h2 class="content-title">status</h2>
        <div class="">
            <a class="btn btn-primary me-2" href="{{ route('admin.status.create') }}">
                <i class="text-muted material-icons md-post_add"></i>
                new status
            </a>

        </div>


    </div>
    <div class="card">

        <div class="card-body">
            <div class=" table-responsive">
                <table class="table  table-responsive ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>description</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orderStatuses as $orderStatus)
                            <tr>
                                <td style="text-align: left; vertical-align: middle;">
                                    {{ $orderStatus->id }}
                                </td>
                                <td>
                                    <img class="image-fluid  " width="100" src="{{ $orderStatus->image_url }}"
                                        alt="">

                                </td>
                                <td style="text-align: left; vertical-align: middle;">
                                    {{ $orderStatus->name }}
                                </td>
                                <td style="text-align: left; vertical-align: middle;">
                                    {{ $orderStatus->description }}
                                </td>

                                <td class="text-center" style="text-align: left; vertical-align: middle;">
                                    <div class="dropdown dropup">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light  btn-sm font-sm"
                                            aria-expanded="false"> <i class="material-icons md-more_horiz"></i> </a>
                                        <div class="dropdown-menu" style="margin: 0px;">

                                            <a href="{{ route('admin.status.edit', $orderStatus) }}"
                                                class="dropdown-item btn  text-secondary ">
                                                Edit
                                            </a>
                                            @if ($orderStatus->id != 1)
                                                <form class="dropdown-item" onsubmit="return window.confirm('Are you sure')"
                                                    action="{{ route('admin.status.destroy', $orderStatus) }}"
                                                    method="post" class="  d-inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}

                                                    <button class="btn text-danger btn-sm w-100 text-start p-0 "
                                                        type="submit">Delete</button>

                                                </form>
                                            @endif

                                        </div>
                                    </div> <!-- dropdown //end -->
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td valign="top" colspan="13" class="dataTables_empty text-center">
                                    <h5>No status Found</h5>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>

        </div>

    </div>


@endsection
