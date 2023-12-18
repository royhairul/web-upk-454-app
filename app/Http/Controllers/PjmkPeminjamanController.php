<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PjmkPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.peminjaman.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.peminjaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Untuk melakukan penyimapanan pada Database
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
        return view('user.peminjaman.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //  Untuk melakukan perubahan data pada database
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
