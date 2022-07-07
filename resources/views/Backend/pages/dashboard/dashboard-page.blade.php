@extends('Backend.layouts.master')
@section('title', 'Dashboard')

@section('content')
    <div class="content-header">
        <div>
            <span class="content-title  ">Dashboard </span>

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
                        <span>{{ $revenue }} SAR</span>

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
                        <h6 class="mb-1 card-title">Orders</h6> <span>{{ count($orders) }}</span>

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
                        <small>{{ $productsCount }}</small>
                        <span class="text-sm">
                            In {{ $categoryCount }} Categories
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
                        <h6 class="mb-1 card-title">Monthly Earning</h6> <span>{{ $monthlyEarning }} SAR</span>

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

            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>billing name</th>
                        <th>date</th>
                        <th>items</th>
                        <th>total </th>
                        <th>status </th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                {{ $order->user->name }}
                            </td>
                            <td>
                                {{ $order->created_at->format('d/m/Y h:i A') }}
                            </td>


                            <td>
                                @if ($order->products_count == 1)
                                    {{ $order->products_count }} Item
                                @else
                                    {{ $order->products_count }} Items
                                @endif
                            </td>
                            <td>
                                {{ $order->total }}
                            </td>
                            <td>
                                <span class="badge badge-soft-secondary rounded-pill font-sm">
                                    {{ $order->status->name }}
                                </span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"
                                        aria-expanded="false"> <i class="material-icons md-more_horiz"></i> </a>
                                    <div class="dropdown-menu" style="margin: 0px;">

                                        <a href="{{ route('admin.orders.show', $order) }}"
                                            class="dropdown-item btn  text-secondary ">
                                            show
                                        </a>


                                        <form class="dropdown-item" onsubmit="return window.confirm('Are you sure')"
                                            action="{{ route('admin.orders.destroy', $order) }}" method="post">
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
                            <td colspan="8">
                                <h6 class="text-center"> No Orders Found</h6>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

@endsection
