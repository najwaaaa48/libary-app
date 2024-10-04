<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'penulis_id' => $id,
            'penulis_nama' => $request->input('nama'),
            'penulis_tmptlahir' => $request->input('tmptlahir'),
            'penulis_tgllahir' => $request->input('tgllahir'),
        ];

        Penulis::createPenulis($data);

        return redirect()->route('penulis.index')->with('success', 'Data penulis berhasil ditambahkan!');
    }
    public function update(Request $request, $id)
    {
        //$id = mt_rand(1000000000000000, 9999999999999999);
        $data = [
            'penulis_id' => $id,
            'penulis_nama' => $request->input('nama'),
            'penulis_tmptlahir' => $request->input('tmptlahir'),
            'penulis_tgllahir' => $request->input('tgllahir'),
        ];

        Penulis::updatePenulis($id, $data);

        return redirect()->route('penulis.index')->with('success', 'Data penulis berhasil diupdate!');
    }

    public function delete($id)
    {
        Penulis::deletePenulis($id);

        return redirect()->route('penulis.index')->with('success', 'Data penulis berhasil dihapus!');
    }
}    
