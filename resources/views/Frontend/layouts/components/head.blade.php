<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,viewport-fit=cover" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-capable" content="yes">

<link rel="shortcut icon" href="/assets/icons/apple-icon-180.png" type="image/x-icon">
<link rel="apple-touch-icon" href="/assets/icons/apple-icon-180.png">
@include('Frontend.layouts.components.startup-images')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link
    href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Mulish:wght@200&family=Roboto:wght@100&display=swap" />
<link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous" defer></script>

<script src="{{ mix('/js/app.js') }}" defer></script>
<link rel="manifest" href="{{ asset('manifest.json') }}" />
@routes
@inertiaHead