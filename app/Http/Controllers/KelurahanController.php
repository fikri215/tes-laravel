<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelurahan = Kelurahan::with(['kecamatan', 'provinsi'])->get();
        return view('kelurahan.index', compact('kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        $provinsi = Provinsi::all();
        return view('kelurahan.create', compact('kecamatan', 'provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kode' => 'required|unique:kelurahan',
            'nama_kelurahan' => 'required',
            'kode_kecamatan' => 'required',
            'kode_provinsi' => 'required'
        ]);

        Kelurahan::create($validate);

        return redirect()->route('kelurahan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelurahan $kelurahan)
    {
        $kecamatan = Kecamatan::all();
        $provinsi = Provinsi::all();
        return view('kelurahan.edit', compact('kecamatan', 'kelurahan', 'provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelurahan $kelurahan)
    {
        $validate = $request->validate([
            'kode' => 'required|unique:kelurahan,kode,' .$kelurahan->id,
            'nama_kelurahan' => 'required',
            'kode_kecamatan' => 'required',
            'kode_provinsi' => 'required'
        ]);

        $kelurahan->kode = $request->kode;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->kode_kecamatan = $request->kode_kecamatan;
        $kelurahan->kode_provinsi = $request->kode_provinsi;
        $kelurahan->save();

        return redirect()->route('kelurahan.index');
    }

    public function updateStatus(Kelurahan $kelurahan)
    {
        $kelurahan->status = !$kelurahan->status;
        $kelurahan->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelurahan $kelurahan)
    {
        $kelurahan->delete();

        return back();
    }
}
