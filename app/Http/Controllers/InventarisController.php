<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('admin.inventaris.index', compact('fasilitas'));
    }

    public function index(Request $data)
    {
        $search = $data->get('search');
        $fasilitas = Fasilitas::where('fasilitas_code', 'like', '%' . $search . '%')
            ->orWhere('fasilitas_name', 'like', '%' . $search . '%')
            ->orWhere('fasilitas_type', 'like', '%' . $search . '%')
            ->orWhere('fasilitas_status', 'like', '%' . $search . '%')
            ->get();
        return view('admin.inventaris.index', compact('fasilitas'));
    }
>>>>>>> 39c3a8276b5addcd59b1894d013b7f991c6c9629
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.inventaris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customMessages = [
            'required' => ':attribute field is required.'
        ];

        // Validasi Data Account
        $validateDataBarang = $request->validate([
            'code' => 'required',
            'nama' => 'required',
            'tipe' => 'required',
            'status' => 'required'
        ], $customMessages);

        // Jika validasi Gagal
        if (!$validateDataBarang) {
            return back()->withErrors($validateDataBarang);
        }

        $dataBarang = [
            'fasilitas_code' => $request->input('code'),
            'fasilitas_name' => $request->input('nama'),
            'fasilitas_type' => $request->input('tipe'),
            'fasilitas_status' => $request->input('status')
        ];

        // Menyimpan data Jadwal ke dalam tabel tb_ruangkelas
        Fasilitas::create($dataBarang);

        return redirect()->route('admin.inventaris.index');
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
        $fasilitas = Fasilitas::where('fasilitas_code', $id)->select('tb_fasilitas.*')->get();
        return view('admin.inventaris.edit', compact('fasilitas'));
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
        $validateDataBarang = $request->validate([
            'code' => 'required',
            'nama' => 'required',
            'tipe' => 'required',
            'status' => 'required'
        ], $customMessages);

        // Jika validasi Gagal
        if (!$validateDataBarang) {
            return back()->withErrors($validateDataBarang);
        }

        $dataBarang = [
            'fasilitas_code' => $request->input('code'),
            'fasilitas_name' => $request->input('nama'),
            'fasilitas_type' => $request->input('tipe'),
            'fasilitas_status' => $request->input('status')
        ];

        // Menyimpan data Jadwal ke dalam tabel tb_ruangkelas
        $fasilitas = Fasilitas::where('fasilitas_code', $id);

        $fasilitas->update($dataBarang);

        return redirect()->route('admin.inventaris.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fasilitas = Fasilitas::where('fasilitas_code', $id);
        $fasilitas->delete();

        return redirect()->route('admin.inventaris.index');
    }
}
