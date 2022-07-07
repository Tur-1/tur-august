@extends('Backend.layouts.master')


@section('title', 'orders')
@section('content')

    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Order detail</h2>
            <p>Details for Order ID: {{ $order->id }}</p>
        </div>
    </div>
    <div class="card">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                    <span>
                        <i class="material-icons md-calendar_today"></i> <b>
                            {{ $date->format('D , M  d ,Y, H:i A') }}</b>
                    </span> <br>

                </div>
                <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                    <form action="{{ route('admin.orders.update', $order) }}" method="post"class="d-flex flex-row">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <select class="form-select" aria-label="Default select example" name="order_status_id">
                            @foreach ($orders_status as $id => $status)
                                <option value="{{ $id }}">{{ $status }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary btn-md ms-2" type="submit">save</button>

                    </form>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="row mb-50 mt-20 order-info-wrap">
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-person"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Customer</h6>
                            <p class="mb-1">
                                {{ $order->user->name }}
                                <br>
                                {{ $order->user->email }}<br>
                                {{ $order->user->phone_number }}
                            </p>
                            <a href="{{ route('admin.users.edit', $order->user->id) }}">View profile</a>
                        </div>
                    </article>
                </div>

                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-place"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Deliver to</h6>
                            <p class="mb-1">
                                Full Name: &ensp;{{ $address['full_name'] }}
                                <br>
                                Address: &ensp;{{ $address['address'] }}
                                <br>
                                City: &ensp;{{ $address['city'] }}
                                <br>
                                Street: &ensp;{{ $address['street'] }}
                            </p>

                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <ul class="list-group ">
                        <li class="list-group-item ">
                            <span class="text-center float-start">Subtotal:</span>
                            <span class="product-subtotal float-end" colspan="2">
                                {{ $order->subtotal }} SAR
                            </span>
                        </li>
                        <li class="list-group-item ">
                            <span class="text-center float-start">Shipping cost:</span>
                            <span class="product-subtotal float-end" colspan="2">
                                {{ $order->shipping_fees == 0 ? 'Free' : $order->shipping_fees . ' SAR' }}
                            </span>
                        </li>
                        <li class="list-group-item  ">
                            <div class="d-flex flex-column float-start">
                                <span class="text-center "> The total amount </span>
                                <span>(including VAT)</span>
                            </div>

                            <span class="product-subtotal float-end" colspan="2">
                                {{ $order->total }} SAR
                            </span>
                        </li>

                        <li class="list-group-item   ">
                            <span class="text-center float-start">status</span>

                            <span
                                class="badge rounded-pill alert-success text-success font-sm float-end">{{ $order->status->name }}
                            </span>

                        </li>
                        <br>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class=" table-responsive">
                    <table class="table  table-responsive ">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product name</th>
                                <th>size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td style="text-align: left; vertical-align: middle;">
                                        <a class="itemside" href="#">
                                            <div class="left">
                                                <img src="{{ $product['main_image_url'] }}" width="90"
                                                    alt="Item">
                                            </div>

                                        </a>
                                    </td>


                                    <td style="text-align: left; vertical-align: middle;">
                                        {{ $product['name'] }} </td>
                                    <td style="text-align: left; vertical-align: middle;">
                                        {{ $product['size'] }}
                                    </td>
                                    <td style="text-align: left; vertical-align: middle;">
                                        {{ $product['price'] }}</td>
                                    <td style="text-align: left; vertical-align: middle;">
                                        {{ $product['quantity'] }} </td>
                                    <td style="text-align: left; vertical-align: middle;">
                                        {{ $product['total_price'] }} SAR
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div> <!-- card-body end// -->
    </div>

@endsection
