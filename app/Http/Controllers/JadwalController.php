<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Http\Requests\StorejadwalRequest;
use App\Http\Requests\UpdatejadwalRequest;
use App\Models\url;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd("a");
        return view('jadwal.views', [
            'jadwal' => jadwal::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorejadwalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(jadwal $jadwal)
    {
        $url = url::all()->pluck('url');
        dd($url);

        if ($url) {
            $videoId = $url->videoID;

            return view('video', compact('videoId'));
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatejadwalRequest $request, jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jadwal $jadwal)
    {
        //
    }
}
