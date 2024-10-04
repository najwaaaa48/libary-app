<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'rak_id' => $id,
            'rak_nama' => $request->input('nama'),
            'rak_lokasi' => $request->input('lokasi'),
            'rak_kapasitas' => $request->input('kapasitas'),
        ];

        Rak::createRak($data);

        return redirect()->route('rak.index')->with('success', 'Data rak berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // $id = mt_rand(1000000000000000, 9999999999999999);
        $data = [
            'rak_id' => $id,
            'rak_nama' => $request->input('nama'),
            'rak_lokasi' => $request->input('lokasi'),
            'rak_kapasitas' => $request->input('kapasitas'),
        ];

        Rak::updateRak($id, $data);

        return redirect()->route('rak.index')->with('success', 'Data rak berhasil diupdate!');
    }
    public function delete($id)
    {
        Rak::deleteRak($id);

        return redirect()->route('rak.index')->with('success', 'Data rak berhasil dihapus!');
    }
}
