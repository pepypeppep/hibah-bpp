<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NonCivitasController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'instansi' => $request->instansi,
            'id' => $request->id
        ];

        return $data;
    }
}
