<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::all();
        // dd($data);
        return view('tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sekolah = Sekolah::all();
        // dd('ini fungsi create');
        return view('tambah', compact('sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validator = $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required',
            'alamat' => 'required',
            'sekolah_id' => 'required|integer'
        ]);

        Siswa::create($validator);
        return redirect('siswa')->with('success', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd("fungsi edit");
        $data = Siswa::find($id);
        $sekolah = Sekolah::all();
        return view('edit', compact('data', 'sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $validator = $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required',
            'alamat' => 'required',
            'sekolah_id' => 'required|integer'
        ]);

        Siswa::find($id)->update($validator);
        return redirect('siswa')->with('success', 'Data berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd('ini fungsi destroy');
        Siswa::find($id)->delete();
        return redirect('siswa')->with('success', 'Data berhasil dihapus');
    }
}