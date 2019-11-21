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
            $pegawais = User::with('roles','unit')->where('unit_id', $request->unit_id)
                                ->where('name', 'like', '%' . $request->nama . '%')
                                ->whereHas('roles', function ($query) {
                                    return $query->where('id', 1)->orWhere('id', 2)->orWhere('id', 3);
                                })->get();
        }else{
            $pegawais = User::with('roles','unit')
                                ->where('name', 'like', '%' . $request->nama . '%')
                                ->whereHas('roles', function ($query) {
                                    return $query->where('id', 1)->orWhere('id', 2)->orWhere('id', 3);
                                })->get();
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
