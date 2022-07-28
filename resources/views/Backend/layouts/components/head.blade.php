<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,viewport-fit=cover" />

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'August') }} - @yield('title')</title>



<link rel="shortcut icon" href="/assets/images/logo/apple-icon-180.png" type="image/x-icon">
<link rel="apple-touch-icon" href="/assets/images/logo/apple-icon-180.png">

@include('Frontend.layouts.components.startup-images')

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />



<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap">

<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


<link href="{{ asset('Backend/css/main.css?v=') . time() }}" rel="stylesheet" type="text/css" />
<link rel="manifest" href="{{ asset('manifest.json') }}" />
<livewire:styles />

@stack('head')
