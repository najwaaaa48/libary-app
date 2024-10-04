<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Buku;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function loginPage()
  {
    return view('public.login');
  }

  public function dashboard()
  {
    return view('dashboard', ['level' => 'siswa']);
  }
  public function dashboardAdmin()
  {
    return view('admin.dashboard', ['level' => 'admin']);
  }

  public function siswa_pegaturan()
  {
    return "false";
  }
  public function registerPage()
  {
    return view('auth.register', ['level' => 'siswa']);
  }
  public function register()
  {
    return view('auth.register', ['level' => 'admin']);
  }
  public function login()
  {
    return view('auth.login', ['level' => 'admin']);
  }
  public function penerbit()
  {
    $data = Penerbit::readPenerbit();

    return view('pages.penerbit', ['level' => 'admin'])->with('penerbit', $data);
  }

  public function admin_update_penerbit($id)
  {

    $penerbit = Penerbit::where('penerbit_id', $id)->first();
    return view('admin_update_penerbit', ['level' => 'admin'])->with('penerbit', $penerbit);
  }

  public function update_penulis($id)
  {

    $penulis = Penulis::where('penulis_id', $id)->first();

    // return $penulis;
    return view('update_penulis', ['level' => 'admin'])->with('penulis', $penulis);

  
  }

  public function update_kategori_buku($id)
  {

    $kategori = KategoriBuku::where('kategori_id', $id)->first();

    return view('update_kategori_buku', ['level' => 'admin'])->with('kategori', $kategori);
  }

  public function update_rak($id)
  {

    $rak = Rak::where('rak_id', $id)->first();
    
    return view('update_rak', ['level' => 'admin'])->with('rak', $rak);
  }

  public function update_buku($id)
  {
      $buku = Buku::with('penulis', 'kategori', 'penerbit', 'rak')->where('buku_id', $id)->first();
      // dd($buku->toArray());
      $penulis = Penulis::all();
      $penerbit = Penerbit::all();
      $kategori = KategoriBuku::all();
      $rak = Rak::all();
      return view('update_buku', ['level' => 'admin', 'penulis' => $penulis, 'penerbit' => $penerbit, 'kategori' => $kategori, 'rak' => $rak, 'buku' => $buku]);
  }

  public function register_user()
  {
    return view('register', ['level' => 'siswa']);
  }

  public function login_user()
  {
    return view('login', ['level' => 'siswa']);
  }

  public function register_admin()
  {
    return view('register', ['level' => 'admin']);
  }

  public function login_admin()
  {
    return view('login', ['level' => 'admin']);
  }
}
