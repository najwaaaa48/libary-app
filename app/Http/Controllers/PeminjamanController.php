<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PeminjamanDetail;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $peminjaman_id = mt_rand(1000000000000000, 9999999999999999);
        $current_date = date("Y-m-d");
        $user_id = "user123";

        $data_peminjaman = [
            'peminjaman_id' => $peminjaman_id,
            'peminjaman_user_id' => $user_id,
            'peminjaman_tglpinjam' => $current_date,
            'peminjaman_tglkembali' => $current_date,
        ];

        $data_detail = [
            'peminjaman_detail_peminjaman_id' => $peminjaman_id,
            'peminjaman_detail_buku_id' => $request->peminjaman_detail_buku_id
        ];

        Peminjaman::create($data_peminjaman);
        PeminjamanDetail::create($data_detail);

        return redirect()->route('peminjaman.index', ['action' => 'show'])->with('success', 'Peminjaman berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $date_now = date("Y-m-d");

        $data = [
            'peminjaman_tglkembali' => $date_now,
            'peminjaman_statuskembali' => 1,
            'peminjaman_note' => $request->catatan,
            'peminjaman_denda' => $request->denda,
        ];

        Peminjaman::where('peminjaman_id', $id)->update($data);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diselesaikan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Peminjaman::where('peminjaman_id', $id)->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus!');
    }
}