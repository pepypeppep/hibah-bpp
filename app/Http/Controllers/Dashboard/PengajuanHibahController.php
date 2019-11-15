<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\AnggotaStaff;
use Illuminate\Http\Request;
use App\Models\PengajuanHibah;
use App\Models\AnggotaMahasiswa;
use App\Models\AnggotaNonCivitas;
use App\Http\Controllers\Controller;
use App\Models\HibahBerkas;

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
        //Save Pengajuan Hibah
        $data = new PengajuanHibah;
        $data->hibah_id = $id;
        $data->judul = $request->judul;
        $data->abstrak = $request->abstrak;
        $data->save();

        //Save Anggota Pegawai
        if (!is_null($request->pegawai_id)) {
            $staffTotal = count($request->pegawai_id);
            for ($i=0; $i < $staffTotal; $i++) {
                $staff = new AnggotaStaff;
                $staff->pengajuan_hibah_id = $data->id;
                $staff->user_id = $request->pegawai_id[$i];
                $staff->save();
            }
        }

        //Save Anggota Mahasiswa
        if (!is_null($request->mahasiwa_id)) {
            $mshTotal = count($request->mahasiwa_id);
            for ($i=0; $i < $mshTotal; $i++) {
                $mhs = new AnggotaMahasiswa;
                $mhs->pengajuan_hibah_id = $data->id;
                $mhs->user_id = $request->mahasiwa_id[$i];
                $mhs->save();
            }
        }

        //Save Anggota Non Civitas
        if (!is_null($request->get_nama_noncivitas)) {
            $noncivitasTotal = count($request->get_nama_noncivitas);
            for ($i=0; $i < $noncivitasTotal; $i++) {
                $noncivitas = new AnggotaNonCivitas;
                $noncivitas->pengajuan_hibah_id = $data->id;
                $noncivitas->nama = $request->get_nama_noncivitas[$i];
                $noncivitas->instansi = $request->get_instansi[$i];
                $noncivitas->save();
            }
        }

        //Set Ketua
        //Find on Pegawai
        $stf = AnggotaStaff::where('user_id', $request->set_ketua[0])->first();
        $mhsw = AnggotaMahasiswa::where('user_id', $request->set_ketua[0])->first();
        if (!is_null($stf)) {
            $stf->ketua = 2;
            $stf->save();
        } else {
            $mhsw->ketua = 2;
            $mhsw->save();
        }

        return redirect()->route('hibah.daftar.upload', $data->id);
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

    public function upload($id)
    {
        return view('dashboard.hibah.daftar.upload', [
            'hibah' => PengajuanHibah::find($id),
            'berkas' => HibahBerkas::where('pengajuan_hibah_id', $id)->get(),
            'cek_berkas' => HibahBerkas::where('pengajuan_hibah_id', $id)->where('jenis_dokumen_id', 1)->count()
        ]);
    }

    public function doUpload(Request $request, $id)
    {
        $request->validate([
            'hibah_dokumen_pengajuan' => 'required|mimes:pdf',
        ]);

        $data = new HibahBerkas;
        $data->pengajuan_hibah_id = $id;
        $data->jenis_dokumen_id = $request->jenis_dokumen_id;
        if (!is_null($request->dokumen_nama)) {
            if ($request->jenis_dokumen_id == 0) {
                $fileName = 'PROPOSAL_'.$request->dokumen_nama.'_'.uniqid().'.'.$request->hibah_dokumen_pengajuan->getClientOriginalExtension();
                $filePath = storage_path() . '/app/public/hibah/berkas_pengajuan/';
                $request->hibah_dokumen_pengajuan->move($filePath, $fileName);
            }else{
                $fileName = 'DOKUMEN_PENDUKUNG_'.$request->dokumen_nama.'_'.uniqid().'.'.$request->hibah_dokumen_pengajuan->getClientOriginalExtension();
                $filePath = storage_path() . '/app/public/hibah/berkas_pengajuan/';
                $request->hibah_dokumen_pengajuan->move($filePath, $fileName);
            }
        }else{
            if ($request->jenis_dokumen_id == 0) {
                $fileName = 'PROPOSAL_'.uniqid().'.'.$request->hibah_dokumen_pengajuan->getClientOriginalExtension();
                $filePath = storage_path() . '/app/public/hibah/berkas_pengajuan/';
                $request->hibah_dokumen_pengajuan->move($filePath, $fileName);
            }else{
                $fileName = 'DOKUMEN_PENDUKUNG_'.uniqid().'.'.$request->hibah_dokumen_pengajuan->getClientOriginalExtension();
                $filePath = storage_path() . '/app/public/hibah/berkas_pengajuan/';
                $request->hibah_dokumen_pengajuan->move($filePath, $fileName);
            }
        }
        $data->hibah_dokumen_pengajuan = $fileName;
        $data->save();

        return redirect()->route('hibah.daftar.upload', $id);
    }

    public function doDelete($id)
    {
        $data = HibahBerkas::find($id);
        $path = storage_path() . '/app/public/hibah/berkas_pengajuan/' . $data->hibah_dokumen_pengajuan;
            if(file_exists($path)){
                unlink($path);
            }
        $data->delete();

        return redirect()->back();
    }
}
