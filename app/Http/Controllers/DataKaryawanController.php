<?php

namespace App\Http\Controllers;

use App\Models\DataKaryawan;
use Illuminate\Http\Request;

class DataKaryawanController extends Controller
{
    public function tambah(Request $request)
    {
        $this->validate($request, [
            'id_karyawan' => 'required|unique:data_karyawan,id_karyawan',
            'nama_karyawan' => 'required|max:100',
            'alamat' => 'required',
            'telepon' => 'required|max:20'
        ]);

        $data = $request->all();
        $karyawan = DataKaryawan::create($data);

        return response()->json($karyawan);
    }

    public function ubah(Request $request, $id)
    {
        $this->validate($request, [
            'nama_karyawan' => 'required|max:100',
            'alamat' => 'required',
            'telepon' => 'required|max:20'
        ]);

        $data = [
            'nama_karyawan' => $request->input('nama_karyawan'),
            'alamat' => $request->input('alamat'),
            'telepon' => $request->input('telepon')
        ];

        try {
            $karyawan = DataKaryawan::whereId($id)->update($data);
            return response()->json([
                "success" => true,
                "message" => "Data berhasil diupdate",
                "data" => $karyawan
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                "success" => false,
                "message" => "Data gagal diupdate",
                "error" => $e->errorInfo
            ]);
        }
    }
}
