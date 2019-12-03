<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Reviewer;
use App\Models\AnggotaStaff;
use Illuminate\Http\Request;
use App\Models\PengajuanHibah;
use App\Models\AnggotaNonCivitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AddReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Reviewer::with('pengajuanHibah','pengajuanHibah.hibah','pengajuanHibah.user','user')
                        ->where('user_id', Auth::user()->id)->get();

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
    public function show($slug, $slug2)
    {
        $hibah = PengajuanHibah::with('user', 'hibah', 'hibah.unit', 'hibah.category', 'berkas', 'proposal', 'reviews')
                    ->where('slug', $slug)
                    ->whereHas('reviews', function ($query) use ($slug2) {
                        return $query->where('slug', $slug2);
                    })->first();
        $review = Reviewer::where('slug', $slug2)->first();
        $kriteria = Criteria::where('hibah_id', $hibah->hibah_id)
                            ->where('tipe_dokumen', $review->tipe_dokumen)->get();

        return view('review.show', [
            'hibah' => $hibah,
            'review' => $kriteria,
            'getRoute' => $review->slug,
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
    public function update(Request $request, $slug)
    {
        $review = Reviewer::where('slug', $slug)->first();

        $total = 0;
        foreach ($request->nilai as $key => $nl) {
            $total += $nl * $request->bobot[$key];
        }

        $data = $review;
        $data->total = $total;
        $data->komentar = $request->komentar;
        $data->save();

        $reviews = Reviewer::where('pengajuan_hibah_id', $review->pengajuan_hibah_id)
                            ->where('tipe_dokumen', $review->tipe_dokumen)
                            ->where('total', 0)
                            ->where('komentar', null)->count();

        if ($reviews == 0) {
            $hibah = PengajuanHibah::find($review->pengajuan_hibah_id);
            $hibah->status_pengajuan = 4;
            $hibah->save();
        }

        Session::flash('flash_message', '<strong class="mr-auto">Berhasil!</strong> review berhasil ditambahkan.');

        return redirect()->route('hibah.review.index');
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
