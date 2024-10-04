<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Buku;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\Peminjaman;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use App\Models\PeminjamanDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function bukuAdmin()
    {
        $data = DB::table('buku')
        ->join('penulis', 'buku.buku_penulis_id', '=', 'penulis.penulis_id')
        ->join('kategori', 'buku.buku_kategori_id', '=', 'kategori.kategori_id')
        ->join('rak', 'buku.buku_rak_id', '=', 'rak.rak_id')
        ->join('penerbit', 'buku.buku_penerbit_id', '=', 'penerbit.penerbit_id')
        ->select('buku.*', 'penulis.penulis_nama', 'kategori.kategori_nama', 'rak.rak_nama', 'rak.rak_lokasi', 'penerbit.penerbit_nama')
        ->paginate(10);

        // return $data;

        return view('admin_buku', ['level' => 'admin', 'buku' => $data]);
    }
    public function kategori_buku()
    {
        $data = KategoriBuku::all();

        return view('kategori_buku', ['level' => 'admin', 'kategori' => $data]);
    }
    public function rak()
    {
        $data = Rak::all();

        return view('rak', ['level' => 'admin', 'rak' => $data]);
    }
    public function penulis()
    {
        $data = Penulis::all();

        return view('penulis', ['level' => 'admin', 'penulis' => $data]);
    }
    public function penerbit()
    {
        $data = Penerbit::readPenerbit();
        // return $data;

        return view('penerbit', ['level' => 'admin', 'penerbit' => $data]);
    }
    public function peminjamanAdmin()
    {

        $user_id = "user123";
        // $user_id = Auth::user()->user_id;  //USER ID BISA DIGANTI DISINI UTK SESSION NTI

        $peminjaman_all = Peminjaman::with(['user', 'peminjamanDetail', 'buku'])->get();

        // return $peminjaman_all;
        
        return view('admin_peminjaman', ['level' => 'admin', 'peminjaman' => $peminjaman_all]);
    }
    public function pengaturan()
    {
        return view('pengaturan', ['level' => 'admin']);
    }

    // create admin
    public function create_buku()
    {
        $rak_fk_field = Rak::select('rak_id', 'rak_nama', 'rak_lokasi')->get();
        $penulis_fk_field = Penulis::select('penulis_id', 'penulis_nama')->get();
        $kategori_fk_field = KategoriBuku::select('kategori_id', 'kategori_nama')->get();
        $penerbit_fk_field = Penerbit::select('penerbit_id', 'penerbit_nama')->get();
        $data = [
            'rak' => $rak_fk_field,
            'penulis' => $penulis_fk_field,
            'kategori' => $kategori_fk_field,
            'penerbit' => $penerbit_fk_field,
        ];

        return view('create_buku', [
            'level' => 'admin',
            'data' => $data
        ]);
    }

    public function create_kategori_buku()
    {
        return view('create_kategori_buku', ['level' => 'admin']);
    }
    public function create_rak()
    {
        return view('create_rak', ['level' => 'admin']);
    }
    public function create_penulis()
    {
        return view('create_penulis', ['level' => 'admin']);
    }
    public function create_penerbit()
    {
        return view('create_penerbit', ['level' => 'admin']);
    }

    //update admin
    public function update_buku()
    {
        // $rak_fk_field = Rak::select('rak_id', 'rak_nama', 'rak_lokasi')->get();
        // $penulis_fk_field = Penulis::select('penulis_id', 'penulis_nama')->get();
        // $kategori_fk_field = KategoriBuku::select('kategori_id', 'kategori_nama')->get();
        // $penerbit_fk_field = Penerbit::select('penerbit_id', 'penerbit_nama')->get();
        // $data = [
        //     'rak' => $rak_fk_field,
        //     'penulis' => $penulis_fk_field,
        //     'kategori' => $kategori_fk_field,
        //     'penerbit' => $penerbit_fk_field,
        // ];

        return view('update_buku', [
            'level' => 'admin',
            // 'data' => $data
        ]);
    }
    public function update_kategori_buku()
    {
        return view('update_kategori_buku', ['level' => 'admin']);
    }
    public function update_penulis()
    {
        return view('update_penulis', ['level' => 'admin']);
    }
    public function update_rak()
    {
        return view('update_rak', ['level' => 'admin']);
    }
    public function admin_update_penerbit()
    {
        return view('admin_update_penerbit', ['level' => 'admin']);
    }
    public function updatepeminjamanadmin($id)
    {

        $data = Peminjaman::with(['user', 'peminjamanDetail', 'buku'])->where('peminjaman_id', $id)->first();

        // return $data;

        return view('admin_update_peminjaman', ['level' => 'admin', 'peminjaman' => $data]);
    }
    public function updatepengaturan()
    {
        return view('update_pengaturan', ['level' => 'admin']);
    }
    // siswa
    public function bukusiswa()
    {
        $buku_all = Buku::with(['penulis', 'kategori', 'penerbit', 'rak'])->get();
        $data = $buku_all->map(function ($buku) {
            return [
                'buku_id' => $buku->buku_id,
                'buku_judul' => $buku->buku_judul,
                'buku_isbn' => $buku->buku_isbn,
                'buku_thnpenerbit' => $buku->buku_thnpenerbit,
                'buku_urlgambar' => $buku->buku_urlgambar,
                'buku_penulis' => $buku->penulis->penulis_nama,
                'buku_kategori' => $buku->kategori->kategori_nama,
                'buku_penerbit' => $buku->penerbit->penerbit_nama,
                'buku_rak' => $buku->rak->rak_lokasi,
            ];
        });
        
        // return $data;

        return view('siswa_buku', ['level' => 'siswa', 'buku' => $data]);
    }
    public function pengaturansiswa()
    {
        return view('siswa_pengaturan', ['level' => 'siswa']);
    }
    public function peminjaman()
    {
        // $user_id = 'ThisUserIsUnique';  //USER ID BISA DIGANTI DISINI UTK SESSION NTI
        $user_id = 'user123';

        // Pemahaman lagi di https://laravel.com/docs/11.x/eloquent-relationships#querying-relationship-existence
        $peminjaman_detail_all = PeminjamanDetail::with(['peminjaman_content', 'buku_content'])
            ->whereHas(
                'peminjaman_content',
                function ($query) use ($user_id) { // use adalah menggunakan variabel $user_id di atas karena di function ini tertutup
                    return $query->where('peminjaman_user_id', $user_id);
                }
            )
            ->get();

        // return $peminjaman_detail_all;

        return view('peminjaman', [
            'peminjaman' => $peminjaman_detail_all,
            'level' => 'siswa'
        ]);
    }
        
    public function updatepengaturansiswa()
    {
        return view('update_pengaturan', ['level' => 'siswa']);
    }
}
