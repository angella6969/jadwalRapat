<?php

namespace App\Http\Controllers;

// namespace App\Http\Requests;

use App\Models\url;
use Google_Client;
use Google_Service_YouTube;
use App\Http\Requests\StoreurlRequest;
use App\Http\Requests\UpdateurlRequest;
use Illuminate\Support\Facades\Validator;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.createCodeYt');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreurlRequest $request)
    {

        $thumbnailUrl = "https://img.youtube.com/vi/{$request->url}/maxresdefault.jpg";
        $thumbnailSize = @getimagesize($thumbnailUrl);
        // dd($request->url);

        $validatedData = $request->validate([

            'url' => 'required',
        ]);

        $thumbnailContent = @file_get_contents($thumbnailUrl);

        if ($thumbnailContent !== false) {
            // Thumbnail tersedia
            url::create($validatedData);
            return redirect('/dashboard')->with('success', 'Berhasil Menambahkan Daftar Video');
        } else {
            // Thumbnail tidak tersedia atau ada masalah lain
            return redirect('/dashboard/code')->with('success', 'Code Tidak Valid');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(url $url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateurlRequest $request, url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(url $url)
    {
        //
    }
}
