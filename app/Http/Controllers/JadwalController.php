<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Http\Requests\StorejadwalRequest;
use App\Http\Requests\UpdatejadwalRequest;
use App\Models\url;
use Carbon\Carbon;

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
            'jadwal' => jadwal::select('room', 'days', 'time', 'tittle', 'by')
                ->latest()
                ->paginate(15),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.createJadwal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorejadwalRequest $request)
    {
        $validatedData = $request->validate([
            'tittle' => 'required',
            'days' => 'required',
            'by' => 'required',
            'room' => 'required',
            'time' => 'required',
        ]);
        jadwal::create($validatedData);
        return redirect('/dashboard')->with('success', 'Berhasil Menambahkan Agenda Rapat');
    }

    /**
     * Display the specified resource.
     */
    public function show(jadwal $jadwal)
    {
        $url = url::all()->pluck('url');
        $videoId = $url;

        return view('jadwal.video', compact('videoId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jadwal $id)
    {
        $a = jadwal::findOrFail($id);
        dd($a);
        
        return view('form/editJadwal', [
            'jadwal' => jadwal::findOrFail($id)
        ]);
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
