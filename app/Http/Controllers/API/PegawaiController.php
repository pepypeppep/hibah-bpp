<?php

namespace App\Http\Controllers\API;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function search(Request $request)
    {
        $pegawais = Pegawai::where('nama', 'like', '%' . $request->nama . '%')->get();

        // $data = array();

        // foreach ($categories as $category)
        // {
        //     $data[] = array("id" => $category->name, "text" => $category->name);
        // }

        return $pegawais;
    }

    public function add(Request $request)
    {
        $pegawai = Pegawai::find($request->id);

        return $pegawai;
    }
}
