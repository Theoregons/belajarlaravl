<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return response([
           'message' => 'Data Berhasil Ditampilkan',
           'data' => Siswa::all()
        ], 200);

        // return response([
        //     'code' => 200,
        //     'response' => [
        //         'message' => 'success',
        //         'data' => Siswa::all()
        //     ]
        // ], 200);
         
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required',
            'alamat' => 'required',
            'sekolah_id' => 'required|integer'
        ]);

        return response([
            'message' => 'Data Berhasil Disimpan',
            'data' => Siswa::create($validator)
         ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $data = [
                'message' => 'Data Berhasil Ditemukan',
                'data' => Siswa::findOrFail($id)
            ];
        }catch(\Throwable $th){
            $data = [
                'message' => 'Data Tidak Ditemukan',
            ];
        }
        return response($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required',
            'alamat' => 'required',
            'sekolah_id' => 'required|integer'
        ]);

        $data = Siswa::find($id);
        $data->update($validator);

        return response([
            'message' => 'Data Berhasil Diupdate',
            'data' => $data
         ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::find($id)->delete();

        return response([
            'message' => 'Data Berhasil Dihapus'
         ], 200);
     }   
}
