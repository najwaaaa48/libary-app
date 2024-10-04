<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'kategori_id' => $id,
            'kategori_nama' => $request->input('nama'),

        ];

        KategoriBuku::createKategoriBuku($data);

        return redirect()->route('kategori.index')->with('success', 'Data Kategori Buku berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // $id = mt_rand(1000000000000000, 9999999999999999);
        $data = [
            'kategori_id' => $id,
            'kategori_nama' => $request->input('nama'),
        ];

        KategoriBuku::updateKategoriBuku($id, $data);

        return redirect()->route('kategori.index')->with('success', 'Data Kategori Buku berhasil diupdate!');
    }

    public function delete($id)
    {
        KategoriBuku::deleteKategoriBuku($id);

        return redirect()->route('kategori.index')->with('success', 'Data kateegori buku berhasil dihapus!');
    }
}
