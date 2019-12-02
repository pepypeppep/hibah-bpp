<?php

namespace App\Http\Controllers\Staff;

use App\Models\Unit;
use App\Models\Hibah;
use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Models\HibahKategori;
use App\Http\Controllers\Controller;
use App\Models\PengajuanHibah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HibahPengaturanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:pengaturan_hibah-list');
        $this->middleware('permission:pengaturan_hibah-create', ['only' => ['create','store']]);
        $this->middleware('permission:pengaturan_hibah-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:pengaturan_hibah-detail', ['only' => ['show']]);
        $this->middleware('permission:pengaturan_hibah-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hibahs = Hibah::with('category','unit')->orderBy('created_at');

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
            'hibahs'=> $hibahs->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10),
            'categories' => HibahKategori::get(),
            'units' => Unit::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.hibah.pengaturan.create', [
            'categories' => HibahKategori::get(),
            'units' => Unit::get()
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
            'hibah_panduan' => 'required|mimes:pdf',
        ]);

        $fileName = uniqid().'.'.$request->hibah_panduan->getClientOriginalExtension();
        $filePath = storage_path() . '/app/public/hibah/panduan/';
        $request->hibah_panduan->move($filePath, $fileName);

        $data = new Hibah;
        $data->user_id = Auth::user()->id;
        $data->hibah_judul = $request->hibah_judul;
        $data->slug = sha1(now());
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
        $data->hibah_panduan = $fileName;
        $data->luaran = $request->luaran;
        $data->save();

        Session::flash('flash_message', '<strong class="mr-auto">Berhasil!</strong> hibah baru berhasil ditambahkan.');

        return redirect()->route('s_hibah.pengaturan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $hibah = Hibah::where('slug', $slug)->first();
        return view('staff.hibah.pengaturan.show', [
            'hibah' => $hibah,
            'proposals' => Criteria::where('hibah_id', $hibah->id)->where('tipe_dokumen', 1)->get(),
            'kemajuans' => Criteria::where('hibah_id', $hibah->id)->where('tipe_dokumen', 2)->get(),
            'akhirs' => Criteria::where('hibah_id', $hibah->id)->where('tipe_dokumen', 3)->get(),
            'luarans' => Criteria::where('hibah_id', $hibah->id)->where('tipe_dokumen', 4)->get(),
            'diajukan' => PengajuanHibah::where('hibah_id', $hibah->id)->where('status_pengajuan', 2)->count(),
            'direview' => PengajuanHibah::where('hibah_id', $hibah->id)->where('status_pengajuan', 3)->count(),
            'dinilai' => PengajuanHibah::where('hibah_id', $hibah->id)->where('status_pengajuan', 4)->count(),
            'diterima' => PengajuanHibah::where('hibah_id', $hibah->id)->where('status_pengajuan', 5)->count(),
            'ditolak' => PengajuanHibah::where('hibah_id', $hibah->id)->where('status_pengajuan', 6)->count(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $hibah = Hibah::where('slug', $slug)->first();
        return view('staff.hibah.pengaturan.edit', [
            'hibah' => Hibah::find($hibah->id),
            'categories' => HibahKategori::get(),
            'units' => Unit::get()
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
        $request->validate([
            'hibah_judul' => 'required|max:255',
        ]);

        $data = Hibah::find($id);
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
        if(!is_null($request->hibah_panduan)) {
            $fileName = uniqid().'.'.$request->hibah_panduan->getClientOriginalExtension();
            $filePath = storage_path() . '/app/public/hibah/panduan/';
            $request->hibah_panduan->move($filePath, $fileName);

            $data->hibah_panduan = $fileName;
        }
        $data->luaran = $request->luaran;
        $data->save();

        Session::flash('flash_message', '<strong class="mr-auto">Berhasil!</strong> hibah berhasil diubah.');

        return redirect()->route('s_hibah.pengaturan.index');
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
