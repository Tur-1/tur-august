<!DOCTYPE html>
<html>

<head>
    @include('Frontend.layouts.components.head')
</head>

<body>
    @inertia

    @env('local')
    <script src="{{ config('app.url') }}:8000/browser-sync/browser-sync-client.js"></script>
    @endenv
</body>

</html>
