<?php

namespace App\Http\Controllers\Staff;

use App\Models\Hibah;
use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HibahPengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hibahs = Hibah::orderBy('created_at');

        $data = $request->validate([
            'judul' => 'string|nullable',
            'hibah_kategori_id' => 'integer|nullable',
            'unit_id' => 'integer|nullable',
        ]);

        $filtered = collect($data)->filter(function ($value, $key) {
            return $value;
        });

        foreach ($filtered->all() as $key => $value) {
            $hibahs->where($key, $value);
        }

        if (!is_null(request('status'))) {
            if (request('status') == 1) {
                $hibahs->where('hibah_tgl_mulai', '>', now())
                        ->where('hibah_tgl_selesai', '>', now());
            } elseif (request('status') == 2) {
                $hibahs->where('hibah_tgl_mulai', '<=', now())
                        ->where('hibah_tgl_selesai', '>=', now());
            } elseif (request('status') == 3) {
                $hibahs->where('hibah_tgl_mulai', '<', now())
                        ->where('hibah_tgl_selesai', '<', now());
            }
        }

        return view('staff.hibah.pengaturan.index', [
            'hibahs'=> $hibahs->paginate(10)
        ]);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criteria($id, $criteria)
    {
        return view('staff.hibah.pengaturan.kriteria.create', [
                'criteria' => $criteria,
                'hibah_id' => $id
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criteriaStore(Request $request, $id)
    {
        $length = count($request->kriteria);

        for ($i=0; $i < $length ; $i++) {
            $data = new Criteria;
            $data->hibah_id = $id;
            $data->tipe_dokumen = $request->tipe_dokumen;
            $data->kriteria = $request->kriteria[$i];
            $data->bobot = $request->bobot[$i];
            $data->range_awal = $request->range_awal[$i];
            $data->range_akhir = $request->range_akhir[$i];
            $data->save();
        }

        return view('staff.hibah.pengaturan.show', [
            'hibah' => Hibah::find($id)
        ]);
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
        return view('staff.hibah.pengaturan.show', [
            'hibah' => Hibah::find($id),
            'proposals' => Criteria::where('hibah_id', $id)->where('tipe_dokumen', 1)->get(),
            'kemajuans' => Criteria::where('hibah_id', $id)->where('tipe_dokumen', 2)->get(),
            'akhirs' => Criteria::where('hibah_id', $id)->where('tipe_dokumen', 3)->get(),
            'luarans' => Criteria::where('hibah_id', $id)->where('tipe_dokumen', 4)->get(),
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
        return view('staff.hibah.pengaturan.edit', [
            'hibah' => Hibah::find($id)
        ]);
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
