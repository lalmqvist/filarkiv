
@extends('welcome')

@section('title', 'Add File')

@section('content')

<div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Filename</th>
                    <th>Description</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Remove</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($files as $file)
                <tr>
                    @if (str_contains($file->filetype, 'jpeg')) 
                        <td><img class="file-icon" src="/img/icons/jpg.png"></td>
                    @endif
                    
                    @if (str_contains($file->filetype, 'pdf')) 
                        <td><img class="file-icon" src="/img/icons/pdf.png"></td>
                    @endif

                    @if (str_contains($file->filetype, 'xml')) 
                        <td><img class="file-icon" src="/img/icons/xml.png"></td>
                    @endif

                    <td><a href="/storage/{{ $file->path }}">{{ $file->filename }}</a></td>
                    <td>{{ $file->description }}</td>
                    <td>{{ $file->uploader }}</td>
                    <td>{{ date_format($file->created_at,"Y/m/d") }}</td>
                    <td><a href="deletefile/{{ $file->id }}"><span class="icons">t</span></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection