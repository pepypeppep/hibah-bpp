<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Hibah;
use Illuminate\Http\Request;

class HibahPengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('staff.hibah.pengaturan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.hibah.pengaturan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hibah_judul' => 'required|max:255',
            // 'hibah_panduan' => 'required|mimes:pdf',
        ]);

        $data = new Hibah;
        $data->hibah_judul = $request->hibah_judul;
        $data->hibah_kategori_id = $request->hibah_kategori;
        $data->hibah_tgl_publish = $request->hibah_tgl_publish;
        $data->hibah_tgl_mulai = $request->hibah_tgl_mulai;
        $data->hibah_tgl_selesai = $request->hibah_tgl_selesai;
        $data->hibah_tgl_mulai_laporankemajuan = $request->hibah_tgl_mulai_laporankemajuan;
        $data->hibah_tgl_selesai_laporankemajuan = $request->hibah_tgl_selesai_laporankemajuan;
        $data->hibah_tgl_mulai_laporanfinal = $request->hibah_tgl_mulai_laporanfinal;
        $data->hibah_tgl_selesai_laporanfinal = $request->hibah_tgl_selesai_laporanfinal;
        $data->hibah_tgl_pengumuman = $request->hibah_tgl_pengumuman;
        $data->unit_id = $request->hibah_unit_id;
        $data->hibah_panduan = $request->hibah_panduan;
        $data->save();

        return redirect()->route('s_hibah.pengaturan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('staff.hibah.pengaturan.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('staff.hibah.pengaturan.edit');
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