<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PJMK;

class PjmkController extends Controller
{
    public function showById($id) {
        $dataPJMK = PJMK::where('pjmk_nim', $id)->get();

        return response()->json([
            'status' => 200,
            'data' => $dataPJMK
        ], 200);
    }
}
