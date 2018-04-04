
@extends('welcome')

@section('title', 'Add File')

@section('content')

<div class="table-responsive">
        <table class="table table-striped" id="files-table">
            <thead>
                <tr>
                    <th onclick="sortTable(0)">Type <span class="icons header-row"></span></th>
                    <th onclick="sortTable(1)">Filename <span class="icons header-row"></span></th>
                    <th>Description <span class="icons header-row"></th>
                    <th onclick="sortTable(3)">Name <span class="icons header-row"></span></th>
                    <th onclick="sortTable(4)">Date <span class="icons header-row"></span></th>
                    <th>Remove <span class="icons header-row"></th>
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

<script>
    
    function sortTable(n) {
    
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("files-table");
        switching = true;
        dir = "asc"; 

        var firstRow = document.getElementsByClassName("header-row");

        for (i = 0; i < (firstRow.length); i++) { 
            if ( i == n ) {
                firstRow[i].innerHTML = 'n';
            } else {
                firstRow[i].innerHTML = ' ';
            }
        }


        while (switching) {
            switching = false;
            rows = table.getElementsByTagName("TR");

            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;

                x = rows[i].getElementsByTagName("TD")[n];

                y = rows[i + 1].getElementsByTagName("TD")[n];
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {

                    shouldSwitch= true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {                
                    
                    shouldSwitch= true;
                    break;
                }
            }
            }
            if (shouldSwitch) {

            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount ++; 
            } else {

            if (switchcount == 0 && dir == "asc") {
                dir = "desc";

                for (i = 0; i < (firstRow.length); i++) { 
            if ( i == n ) {
                firstRow[i].innerHTML = 'u';
            } else {
                firstRow[i].innerHTML = ' ';
            }
        }
                switching = true;
            }
            }
        }
    }
</script>
            

    @endsection