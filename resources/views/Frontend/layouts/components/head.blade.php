<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,viewport-fit=cover" />
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="apple-mobile-web-app-capable" content="yes">


<link rel="shortcut icon" href="/assets/icons/apple-icon-180.png" type="image/x-icon">
<link rel="apple-touch-icon" href="/assets/icons/apple-icon-180.png">
@include('Frontend.layouts.components.startup-images')


<link
    href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Mulish:wght@200&family=Roboto:wght@100&display=swap" />

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous" defer></script>



<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js" defer>
</script>
<link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
<script src="{{ asset(mix('js/manifest.js')) }}" defer></script>
<script src="{{ asset(mix('js/vendor.js')) }}" defer></script>
<script src="{{ mix('/js/app.js') }}" defer></script>
<link rel="manifest" href="{{ asset('manifest.json') }}" />

@routes
@inertiaHead
