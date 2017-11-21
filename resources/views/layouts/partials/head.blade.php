<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title')</title>

<!-- Styles -->
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
<link href="//cdn.rawgit.com/noelboss/featherlight/1.7.6/release/featherlight.min.css" type="text/css" rel="stylesheet" />
<link href="//cdn.rawgit.com/noelboss/featherlight/1.7.6/release/featherlight.gallery.min.css" type="text/css" rel="stylesheet" />


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.css" />

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@yield('stylesheets')

<!-- Scripts -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>

    <script src="//code.jquery.com/jquery-latest.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js"></script>

    <script src="//cdn.rawgit.com/noelboss/featherlight/1.7.6/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="//cdn.rawgit.com/noelboss/featherlight/1.7.6/release/featherlight.gallery.min.js" type="text/javascript" charset="utf-8"></script>

    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

 <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
 <script src="https://use.fontawesome.com/33ea7f11f4.js"></script>
