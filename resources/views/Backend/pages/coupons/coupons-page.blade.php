@extends('Backend.layouts.master')
@section('title', 'coupons')

@section('content')

@section('content')
    <div class="content-header">

        <h2 class="content-title">coupons</h2>
        <div class="">
            <a class="btn btn-primary me-2" href="{{ route('admin.coupons.create') }}">
                <i class="text-muted material-icons md-post_add"></i>
                new coupon
            </a>

        </div>


    </div>
    <div class="card">
        <div class="card-body">
            <div class=" table-responsive">
                <table class="table  table-responsive ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Coupon Code</th>
                            <th>Coupon amount</th>
                            <th>Coupon expires at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($coupons as $coupon)
                            <tr>
                                <td style="text-align: left; vertical-align: middle;">
                                    {{ $coupon->id }}
                                </td>
                                <td style="text-align: left; vertical-align: middle;">
                                    {{ $coupon->code }}
                                </td>
                                <td style="text-align: left; vertical-align: middle;">
                                    {{ $coupon->amount }} {{ $coupon->type == 'percentage' ? ' %' : ' SAR' }}
                                </td>
                                <td style="text-align: left; vertical-align: middle;">
                                    {{ $coupon->expires_at }}
                                </td>

                                <td class="text-center" style="text-align: left; vertical-align: middle;">
                                    <div class="dropdown dropup">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light  btn-sm font-sm"
                                            aria-expanded="false"> <i class="material-icons md-more_horiz"></i> </a>
                                        <div class="dropdown-menu" style="margin: 0px;">

                                            <a href="{{ route('admin.coupons.edit', $coupon) }}"
                                                class="dropdown-item btn  text-secondary ">
                                                Edit
                                            </a>

                                            <form class="dropdown-item" onsubmit="return window.confirm('Are you sure')"
                                                action="{{ route('admin.coupons.destroy', $coupon) }}" method="post"
                                                class="  d-inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn text-danger btn-sm w-100 text-start p-0 "
                                                    type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
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
