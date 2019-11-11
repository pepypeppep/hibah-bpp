<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\AnggotaStaff;
use Illuminate\Http\Request;
use App\Models\PengajuanHibah;
use App\Models\AnggotaMahasiswa;
use App\Models\AnggotaNonCivitas;
use App\Http\Controllers\Controller;

class PengajuanHibahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        dd($request->toArray());
        $data = new PengajuanHibah;
        $data->hibah_id = $id;
        $data->judul = $request->judul;
        $data->abstrak = $request->abstrak;
        $data->save();

        $staff = new AnggotaStaff;
        $staff->pengajuan_hibah_id = $data->id;
        $staff->user_id = $request->user_id;
        $staff->ketua = $request->set_ketua;
        $staff->save();

        $staff = new AnggotaMahasiswa;
        $staff->pengajuan_hibah_id = $data->id;
        $staff->user_id = $request->user_id;
        $staff->ketua = $request->set_ketua;
        $staff->save();

        $staff = new AnggotaNonCivitas;
        $staff->pengajuan_hibah_id = $data->id;
        $staff->nama = $request->nama;
        $staff->instansi = $request->instansi;
        $staff->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
