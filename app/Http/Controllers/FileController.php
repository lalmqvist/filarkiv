<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate form
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'filename' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required|string|max:100',
            ]);
    
    //Fetch the uploaded file
        $theFile = $request->file('file');

    
        //Sets the filename
        $input['file_name'] = $request->input('title');
    
        $destinationPath = public_path('/img/files');
    
        //Set the image size and save to given path
        $theFile->save($destinationPath . '/' . $input['filename']);

    //Saves ad to ads table
        Ad::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'brand' => $request->input('brand'),
            'type' => $request->input('type'),
            'size' => $request->input('size'),
            'color' => $request->input('color'),
            'material' => $request->input('material'),
            'condition' => $request->input('condition'),
            'other' => $request->input('other'),
            'thumb' => $input['thumb_name'],
            'active' => true,
        ]);

        //Adds the images to img_ads table with last ad_id
        foreach ($input['img'] as $key => $img) {
            $latestAd = Ad::latest()->first();
            $latestAd->images()->create([
                'ad_id' => $latestAd->id,
                'img' => $img,
            ]);
        }
            
        //Adds chosen categories to ads_categories table
        foreach ($request->input('category') as $key => $value) {
            $latestAd = Ad::latest()->first();
            $latestAd->ad_categories()->create([
                'ad_id' => $latestAd->id,
                'category_id' => $key,
            ]);
        }
        
        //Adds the chosen charity to ads_charities table    
        $latestAd = Ad::latest()->first();
        $latestAd->charitySum()->create([
            'ad_id' => $latestAd->id,
            'charity_id' => $request->input('charity'),
            'sum' => $request->input('charitySum')
        ]);

        return back()->with('status','Din annons är skapad!');

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
        //
    }
}
