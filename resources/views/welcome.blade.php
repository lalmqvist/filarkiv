<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">

        <title>Filarkiv</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
            @if (session('status'))
            <div class="alert" role="alert">
                {{ session('status') }}
            </div>
            @endif
        <div class="flex-center position-ref full-height">
           
            <div class="content">
                <div class="title">
                    Filarkiv
                </div>
                <div class="links">
                    <a href="allfiles">See all files</a>
                    <a href="addfile">Add new file</a>
                </div>

                @yield('content')

            </div>
        </div>
    </body>
</html>
