<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Unit;
use App\Models\Hibah;
use App\Models\Reviewer;
use Illuminate\Http\Request;
use App\Models\HibahKategori;
use App\Http\Controllers\Controller;
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

        return view('dashboard.hibah.daftar.index', [
            'hibahs' => $hibahs->orderBy('created_at', 'DESC')->paginate(10),
            'categories' => HibahKategori::get(),
            'units' => Unit::get(),
            'getReview' => $review
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
