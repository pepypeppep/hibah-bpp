<?php

namespace App\Http\Controllers\Staff;

use App\Models\Reviewer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PengajuanHibah;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:review-list');
        $this->middleware('permission:review-create', ['only' => ['create','store']]);
        $this->middleware('permission:review-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:review-detail', ['only' => ['show']]);
        $this->middleware('permission:review-delete', ['only' => ['destroy']]);
    }

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
        $check = Validator::make($request->all(),[
            'tipe_dokumen' => 'required',
        ]);

        if ($check->fails()) {
            Session::flash('flash_error', '<strong class="mr-auto">Gagal!</strong> reviewer gagal ditambahkan. Jenis penilaian belum dipilih.');
        }else{
            $data = new Reviewer;
            $data->slug = sha1(now());
            $data->user_id = $request->reviewer_id;
            $data->pengajuan_hibah_id = $id;
            $data->tipe_dokumen = $request->tipe_dokumen;
            $data->save();

            $hibah = PengajuanHibah::find($id);
            $hibah->status_pengajuan = 3;
            $hibah->save();

            Session::flash('flash_message', '<strong class="mr-auto">Berhasil!</strong> reviewer berhasil ditambahkan.');
        }

        return redirect()->back();
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
        $data = Reviewer::find($id);
        $data->delete();

        Session::flash('flash_message', '<strong class="mr-auto">Berhasil!</strong> reviewer berhasil dihapus.');

        return redirect()->back();
    }
}
