<?php

namespace App\Http\Controllers\Staff;

use App\Models\Reviewer;
use App\Models\AnggotaStaff;
use Illuminate\Http\Request;
use App\Models\PengajuanHibah;
use App\Models\AnggotaMahasiswa;
use App\Models\AnggotaNonCivitas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KeuanganController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:pencairan_dana-list');
        $this->middleware('permission:pencairan_dana-create', ['only' => ['create','store']]);
        $this->middleware('permission:pencairan_dana-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:pencairan_dana-detail', ['only' => ['show']]);
        $this->middleware('permission:pencairan_dana-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hibah = PengajuanHibah::with('hibah', 'hibah.unit', 'hibah.category', 'proposal')
                    ->where('hibah_status', 2)
                    ->where('status_pengajuan', 5)->get();

        return view('staff.hibah.keuangan.index', [
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
        $hibah = PengajuanHibah::with('user', 'hibah', 'hibah.unit', 'hibah.category', 'berkas', 'luarans')
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

        return view('staff.hibah.keuangan.show', [
            'hibah' => $hibah,
            'ketua' => $ketua,
            'pegawais' => AnggotaStaff::with('user')->where('pengajuan_hibah_id', $hibah->id)->get(),
            'mahasiswas' => AnggotaMahasiswa::with('user')->where('pengajuan_hibah_id', $hibah->id)->get(),
            'noncivitas' => AnggotaNonCivitas::where('pengajuan_hibah_id', $hibah->id)->get()
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
        $data = PengajuanHibah::find($id);
        $data->status_pencairan = $request->status_pencairan;
        $data->save();

        Session::flash('flash_message', '<strong class="mr-auto">Berhasil!</strong> status pencairan dana berhasil diubah.');

        return redirect()->route('s_hibah.keuangan.index');
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
