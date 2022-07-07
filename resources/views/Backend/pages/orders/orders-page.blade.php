@extends('Backend.layouts.master')
@section('title', 'orders')

@section('content')

@section('content')
    <div class="content-header">

        <span class="content-title">orders</span>

    </div>
    <div class="row">
        <nav class="nav nav-pills   mb-4">
            <div class="nav w-100 d-flex flex-row  nav-pills me-3" id="tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link  active mb-3" id="all-orders" data-bs-toggle="pill" data-bs-target="#all-orders-tab"
                    type="button" role="tab" aria-controls="all-orders-tab" aria-selected="true">
                    <article class="icontext">
                        <span class="icon icon-sm rounded-circle bg-transparent text-center">
                            <img src="{{ asset('Backend/assets/images/boxes.png') }}" alt="" srcset=""
                                class="img-thumbnail ">
                        </span>
                        <div class="text">
                            <h6 class="mb-1 card-title">All Orders</h6>
                            <span>{{ count($orders) }} </span>
                        </div>
                    </article>
                </a>
                @foreach ($orders_status as $index => $order)
                    <a class="nav-link  mb-3 ms-2" id="{{ $index }}-tab" data-bs-toggle="pill"
                        data-bs-target="#status-{{ $index }}" type="button" role="tab"
                        aria-controls="{{ $index }}" aria-selected="false">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-transparent text-center">
                                <img src="{{ $order->image_url }}" alt="" class="img-thumbnail ">
                            </span>
                            <div class="text text-start">
                                <h6 class="mb-1 card-title">{{ $order->name }}</h6>
                                <span>{{ $order->orders_count }}</span>
                            </div>
                        </article>
                    </a>
                @endforeach


            </div>
        </nav>
    </div>
    <div class="row">
        <div class="tab-content" id="tabContent">
            <div class="tab-pane fade show active" id="all-orders-tab" role="tabpanel" aria-labelledby="all-orders-tab">
                <table class="table table-striped table-hover " style="width:100%">
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
                                        <a href="#" data-bs-toggle="dropdown"
                                            class="btn btn-light rounded btn-sm font-sm" aria-expanded="false"> <i
                                                class="material-icons md-more_horiz"></i> </a>
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


            @foreach ($orders_status as $index => $orderStatus)
                <div class="tab-pane fade " id="status-{{ $index }}" role="tabpanel"
                    aria-labelledby="{{ $index }}-tab">
                    <table class="table table-striped table-hover " style="width:100%">
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

                            @forelse ($orderStatus->orders as $order)
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
                                            {{ $orderStatus->name }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown"
                                                class="btn btn-light rounded btn-sm font-sm" aria-expanded="false">
                                                <i class="material-icons md-more_horiz"></i> </a>
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
            @endforeach

        </div>
    </div>

@endsection
