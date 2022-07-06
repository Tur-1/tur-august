<template>
    <div class="card border-0 bg-white mt-4">
        <div class="text-start p-3">
            <h5 class="mb-0">shipping address</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item border-0 d-flex flex-row">
                <span class="me-2">Full Name:</span>
                <span> {{ $page.props.address.full_name }}</span>
            </li>

            <li class="list-group-item border-0 d-flex flex-row">
                <span class="me-2">City:</span>
                <span> {{ $page.props.address.city }}</span>
            </li>
            <li class="list-group-item border-0 d-flex flex-row">
                <span class="me-2">Address:</span>
                <span> {{ $page.props.address.address }}</span>
            </li>
            <li class="list-group-item border-0 d-flex flex-row">
                <span class="me-2">Street:</span>
                <span> {{ $page.props.address.street }} </span>
            </li>
            <li class="list-group-item border-0 d-flex flex-row">
                <span class="me-2">Phone:</span>
                <span> {{ $page.props.address.phone_number }}</span>
            </li>
        </ul>
    </div>
</template>
