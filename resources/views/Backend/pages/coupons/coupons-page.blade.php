@extends('Backend.layouts.master')
@section('title', 'coupons')

@section('content')

@section('content')
    <div class="content-header">

        <span class="content-title">coupons</span>
        <div class="">

            @include('Backend.components.policy-create-button', [
                'model' => App\Models\Coupon\Coupon::class,
                'route' => route('admin.coupons.create'),
                'title' => 'new coupon',
            ])
        </div>


    </div>
    <div class="card">
        <div class="card-body">
            <div class=" table-responsive">
                <table class="table  table-responsive ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>code</th>
                            <th>amount</th>
                            <th>used times</th>
                            <th>expires at</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($coupons as $coupon)
                            <tr>
                                <td>
                                    {{ $coupon->id }}
                                </td>
                                <td>
                                    {{ $coupon->code }}
                                </td>
                                <td>
                                    {{ $coupon->amount }} {{ $coupon->type == 'percentage' ? ' %' : ' SAR' }}
                                </td>
                                <td>
                                    {{ $coupon->used_times }}
                                </td>
                                <td>
                                    {{ $coupon->expires_at }}
                                </td>

                                <td>
                                    @include('Backend.components.policy-dropdown-edit-delete-buttons', [
                                        'model' => $coupon,
                                        'editRoute' => route('admin.coupons.edit', $coupon),
                                        'deleteRoute' => route('admin.coupons.destroy', $coupon),
                                    ])
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td valign="top" colspan="13" class="dataTables_empty text-center">
                                    <h5>No coupons Found</h5>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
