<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function search(Request $request)
    {
        if ($request->unit_id != 0) {
            $pegawais = User::where('unit_id', $request->unit_id)
                                ->where('name', 'like', '%' . $request->nama . '%')
                                ->where('staff',2)->get();
        }else{
            $pegawais = User::where('name', 'like', '%' . $request->nama . '%')->where('staff',2)->get();
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
        $pegawai = User::find($request->id);

        return $pegawai;
    }
}
