<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Peminjaman;
use App\Models\PJMK;
use App\Models\RuangKelas;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $list_peminjaman = Peminjaman::join('tb_pjmk', 'pjmk_nim', '=', 'peminjaman_pjmk')
                            ->join('tb_ruangkelas', 'ruangkelas_code', 'peminjaman_ruangkelas')
                            ->join('tb_matakuliah', 'matakuliah_id', 'peminjaman_matakuliah')
                            ->select('tb_peminjaman.peminjaman_id', 'tb_pjmk.pjmk_kelas', 'tb_ruangkelas.ruangkelas_code', 'tb_pjmk.pjmk_nama', 'tb_peminjaman.peminjaman_waktu', 'tb_matakuliah.matakuliah_nama')
                            ->get();

        return view('admin.laporan', compact('list_peminjaman'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $posts = Peminjaman::join('tb_pjmk', 'pjmk_nim', '=', 'peminjaman_pjmk')
                ->select('tb_pjmk.*')
                ->where('tb_pjmk.pjmk_nama', 'like', '%' . $searchTerm . '%')
                ->get();

        // return dd();
        return view('admin.laporan');
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
