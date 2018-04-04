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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Filarkiv
                </div>

                {{-- --------------------------- --}}
                <form method="POST" action="/addfile" enctype="multipart/form-data">
                    {{ csrf_field() }}
                
                    
                    <div class="form-row">
                
                        {{--  INPUT FÖR FIL  --}}
                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }} col-md-6">
                            <label for="file" class="control-label">Ladda upp en fil</label>
                            <p>Tillåtna format PDF, XML och JPEG</p>
                            <input id="file" type="file" class="form-control" name="file" value="{{ old('file') }}" required autofocus>
                            @if ($errors->has('file'))
                            <span class="help-block">
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('file') }}
                                </div>
                            </span>
                            @endif
                        </div>
                
                        {{--  INPUT FÖR FILNAMN  --}}
                        <div class="form-group{{ $errors->has('filename') ? ' has-error' : '' }} col-md-6">
                            <label for="filename" class="control-label">Filename</label>
                            <input id="filename" type="text" class="form-control" name="filename" value="{{ old('filename') }}">
                            
                            @if ($errors->has('filename'))
                            <span class="help-block">
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('filename') }}
                                </div>
                            </span>
                            @endif
                
                        </div>
                    </div>
                    
                    <div class="form-row">
                        
                        {{--  INPUT FÖR NAMN  --}}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-8">
                            <label for="name" class="control-label">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('name') }}
                                </div>
                            </span>
                            @endif
                
                        </div>
                
                        {{--  INPUT FÖR Description  --}}
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} col-md-4">
                            <label for="description" class="control-label">Description</label>
                            <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required>
                            </textarea>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <button type="submit" class="save-file">
                                Publicera annons
                            </button>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                        
                </form>
                
                
                {{-- --------------------------- --}}

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
