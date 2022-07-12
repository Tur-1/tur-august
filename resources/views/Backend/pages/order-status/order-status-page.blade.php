@extends('Backend.layouts.master')
@section('title', 'order status')

@section('content')
    <div class="content-header">

        <span class="content-title">status</span>
        <div class="">

            @include('Backend.components.policy-create-button', [
                'model' => App\Models\order\OrderStatus::class,
                'route' => route('admin.status.create'),
                'title' => 'new status',
            ])
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
                                    @include('Backend.components.policy-dropdown-edit-delete-buttons', [
                                        'model' => $orderStatus,
                                        'editRoute' => route('admin.status.edit', $orderStatus),
                                        'deleteRoute' => route('admin.status.destroy', $orderStatus),
                                    ])

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
