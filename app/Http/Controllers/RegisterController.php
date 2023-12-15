<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PJMK;
use App\Models\User;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("register");
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
        $pjmk = $request->validate([
            'pjmk_nim' => 'required',
            'pjmk_nama' => 'required',
            'pjmk_kelas' => 'required',
            'pjmk_prodi' => 'required',
            'pjmk_phone' => 'required',
            'pjmk_email' => 'required',
        ]);

        PJMK::create($pjmk);

        return view("welcome");
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
