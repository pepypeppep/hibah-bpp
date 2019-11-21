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
            $mahasiswas = User::with('roles','unit')->where('unit_id', $request->unit_id)
                                ->where('name', 'like', '%' . $request->nama . '%')
                                ->whereHas('roles', function ($query) {
                                    return $query->where('id', 4);
                                })->get();
        }else{
            $mahasiswas = User::with('roles','unit')
                                ->where('name', 'like', '%' . $request->nama . '%')
                                ->whereHas('roles', function ($query) {
                                    return $query->where('id', 4);
                                })->get();
        }

        return $mahasiswas;
    }

    public function add(Request $request)
    {
        $mahasiswa = User::find($request->id);

        return $mahasiswa;
    }
}
