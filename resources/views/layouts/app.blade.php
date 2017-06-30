<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('layouts.partials.head')
</head>

<script>
tinymce.init({
    selector: 'textarea',
    height: 500,
        plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools",
        "media"
        ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | media",
    imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
    content_css: [
    '//www.tinymce.com/css/codepen.min.css'
    ]
});
</script>

<body>
    <div id="app">
        @include('layouts.partials.nav')
        @include('layouts.partials.alerts')
        @yield('content')
    </div>

    @include('layouts.partials.footer')
</body>
</html>
