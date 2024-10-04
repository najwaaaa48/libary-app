<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'penerbit_id' => $id,
            'penerbit_nama' => $request->input('nama'),
            'penerbit_alamat' => $request->input('alamat'),
            'penerbit_notelp' => $request->input('notelp'),
            'penerbit_email' => $request->input('email'),
        ];

        Penerbit::createPenerbit($data);

        return redirect()->route('penerbit.index')->with('success', 'Data penerbit berhasil ditambahkan!');
    }
    public function update(Request $request, $id)
    {
        // $id = mt_rand(1000000000000000, 9999999999999999);
        $data = [
            'penerbit_id' => $id,
            'penerbit_nama' => $request->input('nama'),
            'penerbit_alamat' => $request->input('alamat'),
            'penerbit_notelp' => $request->input('notelp'),
            'penerbit_email' => $request->input('email'),
        ];

        Penerbit::updatePenerbit($id, $data);

        return redirect()->route('penerbit.index')->with('success', 'Data penerbit berhasil diupdate!');
    }

    public function delete($id)
    {
        Penerbit::deletePenerbit($id);

        return redirect()->route('penerbit.index')->with('success', 'Data penerbit berhasil dihapus!');
    }
}
