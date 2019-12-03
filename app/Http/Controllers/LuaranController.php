<?php

namespace App\Http\Controllers;

use App\Models\Luaran;
use Illuminate\Http\Request;
use App\Models\PengajuanHibah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LuaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hibah = PengajuanHibah::with('hibah', 'hibah.category', 'luarans')
                                ->where('user_id', Auth::user()->id)
                                ->where('status_pengajuan', 5)
                                ->whereHas('hibah', function ($query) {
                                    return $query->where('luaran', 1);
                                })->get();
        // dd($hibah);
        return view('luaran.index', [
            'hibahs' => $hibah
        ]);
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
        $data = new Luaran;
        $data->user_id = Auth::user()->id;
        $data->pengajuan_hibah_id = $id;
        $data->jenis_luaran = $request->jenis_luaran;
        $data->doi = $request->doi;
        $data->journal = $request->jurnal;
        $data->status = 1;
        $data->save();

        Session::flash('flash_message', '<strong class="mr-auto">Berhasil!</strong> luaran berhasil diajukan.');

        return redirect()->route('hibah.luaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $hibah = PengajuanHibah::with('hibah', 'hibah.category', 'luarans')
                                ->where('slug', $slug)->first();

        return view('luaran.show', [
            'hibah' => $hibah
        ]);
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
