<!DOCTYPE HTML>
<html lang="en">

<head>
    @include('Backend.layouts.components.head')
</head>

<body id="admin-body">
    <div class="screen-overlay"></div>

    @include('Backend.layouts.components.sidebar')


    <main class="main-wrap">
        @include('Backend.layouts.components.header')
        <section class="content-main">

            @yield('content')

        </section>
    </main>


    @include('Backend.components.alert-message')
    @include('Backend.layouts.components.scripts')
</body>

</html>