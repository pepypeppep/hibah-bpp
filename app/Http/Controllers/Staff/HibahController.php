<?php

namespace App\Http\Controllers\Staff;

use App\Models\AnggotaStaff;
use Illuminate\Http\Request;
use App\Models\PengajuanHibah;
use App\Models\AnggotaMahasiswa;
use App\Models\AnggotaNonCivitas;
use App\Http\Controllers\Controller;
use App\Models\Reviewer;

class HibahController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:daftar_pengajuan_hibah-list');
        $this->middleware('permission:daftar_pengajuan_hibah-create', ['only' => ['create','store']]);
        $this->middleware('permission:daftar_pengajuan_hibah-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:daftar_pengajuan_hibah-detail', ['only' => ['show']]);
        $this->middleware('permission:daftar_pengajuan_hibah-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hibah = PengajuanHibah::with('hibah', 'hibah.unit', 'hibah.category', 'proposal')
                    ->where('hibah_status', 2)->get();

        return view('staff.hibah.daftar.index', [
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $hibah = PengajuanHibah::with('user', 'hibah', 'hibah.unit', 'hibah.category', 'berkas')
                    ->where('slug', $slug)->first();
        $staff = AnggotaStaff::with('user')->where('pengajuan_hibah_id', $hibah->id)
                    ->where('ketua', 2)->get();
        $mahasiswa = AnggotaMahasiswa::with('user')->where('pengajuan_hibah_id', $hibah->id)
                    ->where('ketua', 2)->get();
        if (!is_null($staff)) {
            $ketua = $staff;
        }else{
            $ketua = $mahasiswa;
        }

        return view('staff.hibah.daftar.show', [
            'hibah' => $hibah,
            'ketua' => $ketua,
            'pegawais' => AnggotaStaff::with('user')->where('pengajuan_hibah_id', $hibah->id)->get(),
            'mahasiswas' => AnggotaMahasiswa::with('user')->where('pengajuan_hibah_id', $hibah->id)->get(),
            'noncivitas' => AnggotaNonCivitas::where('pengajuan_hibah_id', $hibah->id)->get(),
            'reviewer1' => Reviewer::with('user', 'user.unit')->where('pengajuan_hibah_id', $hibah->id)->where('tipe_dokumen', 1)->get(),
            'reviewer2' => Reviewer::with('user', 'user.unit')->where('pengajuan_hibah_id', $hibah->id)->where('tipe_dokumen', 2)->get(),
            'reviewer3' => Reviewer::with('user', 'user.unit')->where('pengajuan_hibah_id', $hibah->id)->where('tipe_dokumen', 3)->get(),
            'reviewer4' => Reviewer::with('user', 'user.unit')->where('pengajuan_hibah_id', $hibah->id)->where('tipe_dokumen', 4)->get(),
            'komentars' => Reviewer::with('user', 'user.unit')
                                ->where('pengajuan_hibah_id', $hibah->id)
                                ->where('komentar', '!=', '')->get()
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
