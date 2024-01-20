<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Prodi;
use App\Models\Jadwal;
use App\Models\RuangKelas;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        $ruangkelas = RuangKelas::all();
        return view('admin.jadwal.create', compact('prodi', 'ruangkelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Custom Untuk Pesan Error
        $customMessages = [
            'required' => ':attribute field is required.'
        ];

        // Validasi Data Account
        $validateDataJadwal = $request->validate([
            'hari' => 'required',
            'prodi' => 'required',
            'ruangkelas' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'matakuliah' => 'required',
            'semester' => 'required',
        ], $customMessages);

        // Jika validasi Gagal
        if (!$validateDataJadwal) {
            return back()->withErrors($validateDataJadwal);
        }

        $dataJadwal = [
            'jadwal_hari' => $request->input('hari'),
            'jadwal_prodi' => $request->input('prodi'),
            'jadwal_ruangkelas' => $request->input('ruangkelas'),
            'jadwal_waktu_mulai' => $request->input('waktu_mulai'),
            'jadwal_waktu_selesai' => $request->input('waktu_selesai'),
            'jadwal_matakuliah' => $request->input('matakuliah'),
            'jadwal_semester' => $request->input('semester'),
        ];

        // Menyimpan data Jadwal ke dalam tabel tb_jadwal
        $jadwal = Jadwal::create($dataJadwal);

        return redirect()->route('admin.jadwal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodi = Prodi::all();
        $ruangkelas = RuangKelas::all();
        $jadwal = Jadwal::where('jadwal_id', $id)->select('tb_jadwal.*')->get();

        return view('admin.jadwal.edit', compact('jadwal', 'prodi', 'ruangkelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Custom Untuk Pesan Error
        $customMessages = [
            'required' => ':attribute field is required.'
        ];

        // Validasi Data Account
        $validateDataJadwal = $request->validate([
            'hari' => 'required',
            'prodi' => 'required',
            'ruangkelas' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'matakuliah' => 'required',
            'semester' => 'required',
        ], $customMessages);

        // Jika validasi Gagal
        if (!$validateDataJadwal) {
            return back()->withErrors($validateDataJadwal);
        }

        $dataJadwal = [
            'jadwal_hari' => $request->input('hari'),
            'jadwal_prodi' => $request->input('prodi'),
            'jadwal_ruangkelas' => $request->input('ruangkelas'),
            'jadwal_waktu_mulai' => $request->input('waktu_mulai'),
            'jadwal_waktu_selesai' => $request->input('waktu_selesai'),
            'jadwal_matakuliah' => $request->input('matakuliah'),
            'jadwal_semester' => $request->input('semester'),
        ];

        // Menyimpan data Jadwal ke dalam tabel tb_jadwal
        $jadwal = Jadwal::where('jadwal_id', $id);

        $jadwal->update($dataJadwal);

        return redirect()->route('admin.jadwal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
