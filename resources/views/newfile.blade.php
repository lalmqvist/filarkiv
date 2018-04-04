
@extends('welcome')

@section('title', 'Add File')

@section('content')

<form method="POST" action="/addfile" enctype="multipart/form-data">
    {{ csrf_field() }}

    
    <div class="form-row">

        {{--  INPUT FÖR FIL  --}}
        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }} col-md-6">
            <label for="file" class="control-label">Choose a file (pdf, xml or jpeg)</label>
            <input id="file" type="file" class="input-fields" name="file" value="{{ old('file') }}" required>
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
            <input id="filename" type="text" class="input-fields" name="filename" value="{{ old('filename') }}" required>
            
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
            <label for="name" class="control-label">Your Name</label>
            <input id="name" type="text" class="input-fields" name="name" value="{{ old('name') }}" required>

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
            <textarea id="description" class="input-fields" name="description"></textarea>
            </textarea>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="save-file">
                Save file
            </button>
        </div>
        <div class="col-md-3"></div>
    </div>
        
</form>
@endsection
