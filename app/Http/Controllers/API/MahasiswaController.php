<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    public function search(Request $request)
    {
        if ($request->unit_id != 0) {
            $mahasiswas = User::where('unit_id', $request->unit_id)
                                ->where('name', 'like', '%' . $request->nama . '%')
                                ->where('mahasiswa',2)->get();
        }else{
            $mahasiswas = User::where('name', 'like', '%' . $request->nama . '%')->where('mahasiswa',2)->get();
        }

        return $mahasiswas;
    }

    public function add(Request $request)
    {
        $mahasiswa = User::find($request->id);

        return $mahasiswa;
    }
}
