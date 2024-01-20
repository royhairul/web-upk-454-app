<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\RuangKelas;

class RuangKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangkelas = RuangKelas::all();
        return view('admin.kelas.index', compact('ruangkelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.kelas.create', compact('prodi'));
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
        $validateDataKelas = $request->validate([
            'code' => 'required',
            'kapasitas' => 'required',
            'status' => 'required',
            'prodi' => 'required'
        ], $customMessages);

        // Jika validasi Gagal
        if (!$validateDataKelas) {
            return back()->withErrors($validateDataKelas);
        }

        $dataRuangKelas = [
            'ruangkelas_code' => $request->input('code'),
            'ruangkelas_prodi' => $request->input('prodi'),
            'ruangkelas_kapasitas' => $request->input('kapasitas'),
            'ruangkelas_status' => $request->input('status')
        ];

        // Menyimpan data Jadwal ke dalam tabel tb_ruangkelas
        RuangKelas::create($dataRuangKelas);

        return redirect()->route('admin.kelas.index');
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
    public function edit(string $kelas)
    {
        $ruangkelas = RuangKelas::where('ruangkelas_code', $kelas)->select('tb_ruangkelas.*')->get();
        $prodi = Prodi::all();
        return view('admin.kelas.edit', compact('ruangkelas', 'prodi'));
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
        $validateDataKelas = $request->validate([
            'code' => 'required',
            'kapasitas' => 'required',
            'status' => 'required',
            'prodi' => 'required'
        ], $customMessages);

        // Jika validasi Gagal
        if (!$validateDataKelas) {
            return back()->withErrors($validateDataKelas);
        }

        $dataRuangKelas = [
            'ruangkelas_code' => $request->input('code'),
            'ruangkelas_prodi' => $request->input('prodi'),
            'ruangkelas_kapasitas' => $request->input('kapasitas'),
            'ruangkelas_status' => $request->input('status')
        ];

        // Menyimpan data Jadwal ke dalam tabel tb_ruangkelas
        $ruangkelas = RuangKelas::where('ruangkelas_code', $id);

        $ruangkelas->update($dataRuangKelas);

        return redirect()->route('admin.kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruangkelas = RuangKelas::where('ruangkelas_code', $id);
        $ruangkelas->delete();
        
        return redirect()->route('admin.kelas.index');
    }
}
