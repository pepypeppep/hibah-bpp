<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Unit;
use App\Models\Hibah;
use App\Models\Reviewer;
use Illuminate\Http\Request;
use App\Models\HibahKategori;
use App\Http\Controllers\Controller;
use App\Models\Luaran;
use App\Models\PengajuanHibah;
use Illuminate\Support\Facades\Auth;

class HibahController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:hibah-list');
        $this->middleware('permission:hibah-create', ['only' => ['create','store']]);
        $this->middleware('permission:hibah-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:hibah-detail', ['only' => ['show']]);
        $this->middleware('permission:hibah-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hibahs = Hibah::with('category','unit')
                        ->where('hibah_tgl_mulai', '<=', now())
                        ->where('hibah_tgl_selesai', '>=', now())
                        ->orderBy('created_at');
        $review = Reviewer::where('user_id', Auth::user()->id)
                            ->where('komentar', null)->count();

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

        // $checkHibah = PengajuanHibah::with('hibah', 'luarans')
        //                             ->where('user_id', Auth::user()->id)
        //                             ->where('status_pengajuan', 5)
        //                             ->whereHas('hibah', function ($query) {
        //                                 return $query->where('luaran', 1);
        //                             })
        //                             ->whereHas('luarans', function ($query) {
        //                                 return $query->where('status', '!=', 2);
        //                             })->get();


        $checkHibah = PengajuanHibah::with('hibah', 'luarans')
                                    ->where('user_id', Auth::user()->id)
                                    ->where('status_pengajuan', 5)
                                    ->whereHas('hibah', function ($query) {
                                        return $query->where('luaran', 1);
                                    })->get();

        $checkLuaran = ['1','1'];
        foreach ($checkHibah as $ch) {
            $checkLuaran = Luaran::with('user', 'pengajuanHibah', 'pengajuanHibah.hibah')
                                ->where('user_id', Auth::user()->id)
                                ->where('pengajuan_hibah_id', $ch->id)
                                ->where('status', 2)->get();
        }

        $luaran = Luaran::with('user', 'pengajuanHibah', 'pengajuanHibah.hibah')
                        ->where('user_id', Auth::user()->id)
                        ->where('status', 2)->get();

        // $getCheck = PengajuanHibah::with('hibah', 'luarans')
        //                             ->where('user_id', Auth::user()->id)
        //                             ->where('status_pengajuan', 5)
        //                             ->whereHas('hibah', function ($query) {
        //                                 return $query->where('luaran', 1);
        //                             })
        //                             ->whereHas('luarans', function ($query) {
        //                                 return $query->where('status', 1);
        //                             })->get();
        // $luaran = Luaran::with('user', 'pengajuanHibah', 'pengajuanHibah.hibah')
        //                 ->where('user_id', Auth::user()->id)
        //                 ->whereHas('pengajuanHibah', function ($query) {
        //                     return $query->where('user_id', Auth::user()->id)->where('status_pengajuan', 5);
        //                 })->whereHas('pengajuanHibah.hibah', function ($query) {
        //                     return $query->where('luaran', 1);
        //                 })->get();
        // dd($checkLuaran);

        $stack = [];
        $stack2 = [];
        if (count($checkLuaran) == 0) {
            foreach ($checkHibah as $hb) {
                $stack[] = $hb->hibah->hibah_kategori_id;
                $stack2[] = $hb->hibah->unit_id;
            }
        }
        // dd($stack);

        return view('dashboard.hibah.daftar.index', [
            'hibahs' => $hibahs->orderBy('created_at', 'DESC')->paginate(10),
            'categories' => HibahKategori::get(),
            'units' => Unit::get(),
            'getReview' => $review,
            'luaran' => $luaran,
            'checkHibah' => $checkHibah,
            'stack' => $stack,
            'stack2' => $stack2
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
