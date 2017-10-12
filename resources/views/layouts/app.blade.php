<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link href="css/app.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        @include('header')
        <div class="container verite-content">
            @yield('content')
        </div>
        @include('footer')
    </body>
</html>
