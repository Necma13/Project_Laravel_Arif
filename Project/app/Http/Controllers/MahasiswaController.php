<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Jurusan;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $mhs = Mahasiswa::all();
        return view('mahasiswa.index',compact('nomor','mhs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jur = Jurusan::all();
        return view('mahasiswa.form',compact('jur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nim' => 'required|unique:mahasiswas,nim',
        'nama' => 'required',
        'tempat' => 'required',
        'tanggal' => 'required',
        'alamat' => 'required',
        'jk' => 'required',
        'jurusans_id' => 'required',
        'agama' => 'required',

    ]);

    $mhs = new Mahasiswa;
    $mhs->nim = $request->nim;
    $mhs->nama = $request->nama;
    $mhs->tempat = $request->tempat;
    $mhs->tanggal = $request->tanggal;
    $mhs->alamat = $request->alamat;
    $mhs->jk = $request->jk;
    $mhs->jurusans_id = $request->jurusans_id;
    $mhs->agama = $request->agama;
    $mhs->foto = $request->foto->getClientOriginalName();
    $mhs->save();

    //untuk tersimpan di public
    $request->foto->move('foto',$request->foto->getClientOriginalName());

    //untuk tersimpan di storage
    //$request->foto->storeAs('foto',$request->foto->getClientOriginalName());

    return redirect('/Mahasiswa/');
}
    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        return view('Mahasiswa.detail', compact('mhs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        $jur = Jurusan::all();
        return view('Mahasiswa.edit', compact('mhs', 'jur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mhs = Mahasiswa::findOrFail($id);

        $mhs->nama = $request->input('nama');
        $mhs->tempat = $request->input('tempat');
        $mhs->tanggal = $request->input('tanggal');
        $mhs->alamat = $request->input('alamat');
        $mhs->jk = $request->input('jk');
        $mhs->jurusans_id = $request->input('jurusans_id');
        $mhs->agama = $request->input('agama');

        $mhs->save();

        return redirect('/Mahasiswa/')->with('success', 'Data Mahasiswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
