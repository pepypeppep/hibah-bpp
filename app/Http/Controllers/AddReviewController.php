<?php

namespace App\Http\Controllers;

use App\Models\Reviewer;
use App\Models\AnggotaStaff;
use Illuminate\Http\Request;
use App\Models\PengajuanHibah;
use App\Models\AnggotaNonCivitas;
use Illuminate\Support\Facades\Auth;

class AddReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Reviewer::with('pengajuanHibah','pengajuanHibah.hibah','pengajuanHibah.user','user')->where('user_id', Auth::user()->id)->get();

        return view('review.index', [
            'reviews' => $data
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
        $hibah = PengajuanHibah::with('user', 'hibah', 'hibah.unit', 'hibah.category', 'berkas', 'proposal')
                    ->where('slug', $slug)->first();

        return view('review.show', [
            'hibah' => $hibah,
            'pegawais' => AnggotaStaff::with('user')->where('pengajuan_hibah_id', $hibah->id)->get(),
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
