<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PJMK;

class PjmkController extends Controller
{
    public function showById($id) {
        $dataPJMK = PJMK::where('pjmk_nim', $id)
                    ->join('tb_prodi', 'prodi_code', 'pjmk_prodi')
                    ->join('tb_users', 'nim', 'pjmk_nim')
                    ->select('tb_pjmk.*', 'tb_prodi.prodi_nama', 'tb_users.username')
                    ->get()[0];

        return response()->json([
            'status' => 200,
            'data' => $dataPJMK
        ], 200);
    }
}
