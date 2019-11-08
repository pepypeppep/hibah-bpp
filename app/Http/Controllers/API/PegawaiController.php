<?php

namespace App\Http\Controllers\API;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function search(Request $request)
    {
        if ($request->unit_id != 0) {
            $pegawais = Pegawai::where('unit_id', $request->unit_id)
                                ->where('nama', 'like', '%' . $request->nama . '%')->get();
        }else{
            $pegawais = Pegawai::where('nama', 'like', '%' . $request->nama . '%')->get();
        }

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
