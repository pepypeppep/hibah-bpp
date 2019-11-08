<?php

namespace App\Http\Controllers\Staff;

use App\Models\Hibah;
use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KriteriaController extends Controller
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
    public function create($id, $criteria)
    {
        return view('staff.hibah.pengaturan.kriteria.create', [
                'criteria' => $criteria,
                'hibah_id' => $id
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $criteria)
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

        return redirect()->route('s_hibah.pengaturan.show', $id);
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
        return view('staff.hibah.pengaturan.kriteria.edit', [
            'kriteria' => Criteria::find($id)
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
        $hibah_id = $request->hibah_id;

        $data = Criteria::find($id);
        $data->kriteria = $request->kriteria;
        $data->bobot = $request->bobot;
        $data->range_awal = $request->range_awal;
        $data->range_akhir = $request->range_akhir;
        $data->save();

        return redirect()->route('s_hibah.pengaturan.show', $hibah_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Criteria::find($id);
        $data->delete();

        return redirect()->back();
    }
}