@extends('Backend.layouts.master')
@section('title', 'Dashboard')

@section('content')
<div class="content-header">
    <div>
        <h2 class="content-title card-title">Dashboard </h2>

    </div>
    <div>

    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="card card-body mb-4">
            <article class="icontext">
                <span class="icon icon-sm rounded-circle bg-primary-light"><i
                        class="text-primary material-icons md-monetization_on"></i></span>
                <div class="text">
                    <h6 class="mb-1 card-title">Revenue</h6>
                    {{-- <span>{{ $revenue }} SAR</span> --}}

                </div>
            </article>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body mb-4">
            <article class="icontext">
                <span class="icon icon-sm rounded-circle bg-success-light"><i
                        class="text-success material-icons md-local_shipping"></i></span>
                <div class="text">
                    <h6 class="mb-1 card-title">Orders</h6> {{-- <span>{{ count($orders) }}</span> --}}

                </div>
            </article>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body mb-4">
            <article class="icontext">
                <span class="icon icon-sm rounded-circle bg-warning-light"><i
                        class="text-warning material-icons md-qr_code"></i></span>
                <div class="text">
                    <h6 class="mb-0 card-title">
                        Products
                    </h6>
                    {{-- <small>{{ $productsCount }}</small> --}}
                    <span class="text-sm">
                        {{-- In {{ $categoryCount }} Categories --}}
                    </span>
                </div>
            </article>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body mb-4">
            <article class="icontext">
                <span class="icon icon-sm rounded-circle bg-info-light"><i
                        class="text-info material-icons md-shopping_basket"></i></span>
                <div class="text">
                    <h6 class="mb-1 card-title">Monthly Earning</h6> {{-- <span>{{ $monthlyEarning }} SAR</span> --}}

                </div>
            </article>
        </div>
    </div>
</div>

<div class="card mb-4">
    <header class="card-header">
        <h4 class="card-title">Latest orders</h4>

    </header>
    <div class="card-body">
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table align-middle table-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="align-middle" scope="col">Order ID</th>
                            <th class="align-middle" scope="col">Billing Name</th>
                            <th class="align-middle" scope="col">Order Date</th>
                            <th class="align-middle" scope="col">coupon</th>

                            <th class="align-middle" scope="col">Items</th>
                            <th class="align-middle" scope="col">Total</th>
                            <th class="align-middle" scope="col">Status </th>
                            <th class="align-middle" scope="col">View Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                        <td>
                            {{ $order->user->name }}
                        </td>
                        <td>
                            {{ $order->order_date }}
                        </td>
                        <td>
                            {{ $order->coupon->code ?? '' }}
                        </td>
                        <td>
                            @if ($order->products_count == 1)
                            {{ $order->products_count }} Item
                            @else
                            {{ $order->products_count }} Items
                            @endif
                        </td>
                        <td>
                            {{ $order->order_total }}
                        </td>
                        <td>
                            @if ($order->status->status == 'Cancelled')
                            <span
                                class="badge rounded-pill  alert-danger text-black font-sm">{{ $order->status->status }}
                            </span>
                            @else
                            <span
                                class="badge rounded-pill alert-success text-success font-sm">{{ $order->status->status }}
                            </span>
                            @endif

                        </td>
                        <td>
                            @can('view', $order)
                            <a href="{{ route('admin.orders.show', $order) }}" class=" btn btn-primary btn-sm">
                                View details
                            </a>
                            @endcan
                        </td>
                        </tr>
                        @endforeach --}}


                    </tbody>
                </table>
            </div>
        </div> <!-- table-responsive end// -->
    </div>
</div>

@endsection