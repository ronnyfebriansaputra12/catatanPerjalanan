<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use League\CommonMark\Util\UrlEncoder;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penduduk.index',[
            'penduduks'=> Penduduk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/penduduk',[
            'penduduks'=>Penduduk::all()
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
        $validationData = request()->validate([
            'nik'=>'required|unique',
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'provinsi'=>'required',
            'kota'=>'required',
            'alamat_lengkap'=>'required',
            'email'=>'required|unique',
            'telp'=>'required',
            'pekerjaan'=>'required'
        ]);

        Penduduk::create($validationData);
        return redirect('/penduduk')->with('pesan_tambah','Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk)
    {
        return view('/penduduk.edit',[
            'penduduks'=>$penduduk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $validationData = request()->validate([
            'nik'=>'required',
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'provinsi'=>'required',
            'kota'=>'required',
            'alamat_lengkap'=>'required',
            'email'=>'required',
            'telp'=>'required',
            'pekerjaan'=>'required'
        ]);

        Penduduk::where('id',$penduduk->id)->updated($validationData);
        return redirect('/penduduk')->with('pesan_edit','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduk $penduduk)
    {
        Penduduk::destroy($penduduk->id);
        return redirect('/penduduk')->with('pesan_hapus','Data Berhasil di Hapus');
    }
}
