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
        return view('jadwal.views', [
            'jadwal' => jadwal::where('days', '>', Carbon::now())
                ->paginate(15)
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

        $existingJadwal = jadwal::where('days', $validatedData['days'])
            ->where('time', $validatedData['time'])
            ->where('room', $validatedData['room'])
            ->first();

        if ($existingJadwal) {
            return redirect('/dashboard/create')->with('fail', 'Ruang Rapat Sudah Terisi, silahkan pilih RR atau waktu yang lain ');
        } else {
            jadwal::create($validatedData);
            return redirect('/dashboard')->with('success', 'Berhasil Menambahkan Agenda Rapat');
        }
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
    public function edit($id)
    {
        $a = jadwal::findOrFail($id);

        return view('form/editJadwal', [
            'jadwal' => $a,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatejadwalRequest $request, jadwal $jadwal)
    {
        $validatedData = $request->validate([
            'tittle' => 'required',
            'days' => 'required',
            'by' => 'required',
            'room' => 'required',
            'time' => 'required',
        ]);
        jadwal::where('id', $jadwal->id)->update($validatedData);

        return redirect("/dashboard")->with('success', 'Berhasil Merubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jadwal $jadwal)
    {
        //
    }
}
