<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Http\Requests\StorejadwalRequest;
use App\Http\Requests\UpdatejadwalRequest;
use App\Models\url;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $timezone = 'Asia/Jakarta';
        $now = Carbon::now($timezone);
        return view('jadwal.views', [
            'jadwal' => jadwal::where('days', '>=', $now->format('Y-m-d'))
                ->orderBy('days', 'asc')
                ->paginate(10)
        ]);



        // // Mengambil data jadwal yang memiliki tanggal ('days') lebih besar atau sama dengan waktu saat ini.
        // $jadwal = DB::table('jadwal')
        //     ->where('days', '>=', $now->format('Y-m-d')) // Menggunakan format 'Y-m-d' untuk membandingkan tanggal.
        //     ->orderBy('days', 'asc')
        //     ->paginate(10);

        // // Mengirim data jadwal ke view 'jadwal.views'.
        // return view('jadwal.views', compact('jadwal'));
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
        DB::beginTransaction();

        // $existingJadwal = jadwal::where('days', $validatedData['days'])
        //     ->where('time', $validatedData['time'])
        //     ->where('room', $validatedData['room'])
        //     ->first();

        $selectedTime = $validatedData['time'];
        $selectedRoom = $validatedData['room'];

        if ($selectedTime === 'fullday') {
            $existingJadwal = jadwal::where('days', $validatedData['days'])
                ->where('room', $selectedRoom)
                ->first();
            if ($existingJadwal) {
                // Jika ada jadwal yang menggunakan ruangan pada hari yang sama
                return redirect('/create')->with('fail', 'Ruang Rapat Sudah Dipesan, silahkan pilih RR atau waktu yang lain ');
            }
        } else {
            $existingJadwal = jadwal::where('days', $validatedData['days'])
                ->where(function ($query) use ($selectedTime, $selectedRoom) {
                    $query->where('time', $selectedTime)
                        ->orWhere('room', $selectedRoom);
                })
                ->first();
        }

        try {
            if ($existingJadwal) {
                return redirect('/create')->with('fail', 'Ruang Rapat Sudah Terisi, silahkan pilih RR atau waktu yang lain ');
            } else {

                jadwal::create($validatedData);
                DB::commit();

                if (auth()->check()) {
                    return redirect('/dashboard')->with('success', 'Berhasil Menambahkan Agenda Rapat');
                } else {
                    return redirect('/')->with('success', 'Berhasil Menambahkan Agenda Rapat');
                }
            }
        } catch (\Throwable $th) {
            DB::rollback();
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
