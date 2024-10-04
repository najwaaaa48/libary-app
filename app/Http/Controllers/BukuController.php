<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'buku_id' => $id,
            'buku_penulis_id' => $request->buku_penulis_id,
            'buku_penerbit_id' => $request->buku_penerbit_id,
            'buku_kategori_id' => $request->buku_kategori_id,
            'buku_judul' => $request->buku_judul,
            'buku_isbn' => $request->buku_isbn,
            'buku_thnpenerbit' => $request->buku_thnpenerbit,
            'buku_rak_id' => $request->buku_rak_id,



        ];

        Buku::createBuku($data);

        return redirect()->route('buku.index', ['action' => 'show'])->with('primary', 'Data buku berhasil ditambahkan!');
    }

    public function update(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'buku_id' => $id,
            'buku_penulis_id' => $request->buku_penulis_id,
            'buku_penerbit_id' => $request->buku_penerbit_id,
            'buku_kategori_id' => $request->buku_kategori_id,
            'buku_judul' => $request->buku_judul,
            'buku_isbn' => $request->buku_isbn,
            'buku_thnpenerbit' => $request->buku_thnpenerbit,
            'buku_rak_id' => $request->buku_rak_id,



        ];

        Buku::updateBuku($id, $data);

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diupdate!');
    }

    public function delete($id)
    {

        $peminjamanIds = Peminjaman::whereHas('buku', function ($query) use ($id) {
            $query->where('buku_id', $id);
        })->pluck('peminjaman_id');

        Peminjaman::whereIn('peminjaman_id', $peminjamanIds)->delete();

        Buku::deleteBuku($id);

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus!');
    }
}
