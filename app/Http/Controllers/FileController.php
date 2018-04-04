<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UploadRequest;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();

// dd($files);
        return view('files', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newfile');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate form
        $request->validate([
            'file' => 'required|file|mimes:jpeg,pdf,xml',
            'filename' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            ]);
    
        //Fetch the uploaded file
        $theFile = $request->file('file');
        
        //Sets the filename
        $fileName = $request->input('filename') . '.' . $theFile->getClientOriginalExtension();
        
        //Fetch the uploaded files filetype
        $fileType = $theFile->getMimeType();


        //save to given path
        $path = $request->file('file')->storeAs(
            'files', $fileName
        );

        //Save file to files table
        File::create([
            'filename' => $fileName,
            'path' => $path,
            'uploader' => $request->input('name'),
            'filetype' => $fileType,
            'description' => $request->input('description'),
        ]);
        
        return back()->with('status','The file has been saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        Storage::delete('files/'.$file->filename);
        File::where('id', $file->id)->delete();

        return back()->with('status','The file has been deleted!');
    }
}
