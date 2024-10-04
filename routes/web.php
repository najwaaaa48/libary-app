<?php

use App\Models\Buku;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RakController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\PeminjamanDetailController;

Route::get('/', function () {
	return 'Hallo, aku sedang belajar membuat website dengan Laravel';
});
// Route::get('/dashboard', [RoutesController::class, 'Dashboard']);
Route::match(['get', 'post'], '/anggota', function () {
	return 'Hallo, aku membuat route anggota dengan beberapa method';
});
Route::redirect('/buku', '/dashboard');
Route::get('/', [RequestController::class, 'store']);
Route::get('/nama', function() {
    $nama = session('nama');
    return 'Halaman nama dengan nama Najwa Istighfara' . $nama;
});
Route::get('/array', function () {
    return [1, 'Perpustakaan', true];
});
Route::get('/hello', function () {
    return response($content = 'Hallo Laravel')
        ->withHeaders([
            'Content-Type' => 'text/html',
            'X-Header-One' => 'Header Value 1',
            'X-Header-Two' => 'Header Value 2',
        ]);
});
Route::get('/tes', function () {
    return redirect('/hello');
});
Route::get('/tes', function () {
    return redirect()->action([RoutesController::class, 'Dashboard']);
});
Route::get('/', [RoutesController::class, 'Dashboard']);
Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'postLogin']);
Route::get('/perpustakaan/{buku}', [RoutesController::class, 'perpustakaan']);
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/bootstrap', function () {
    return view('bootstrap');
});
Route::get('/', function () {
    return view('welcome');
});

// Dasboard siswa
Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
Route::get('/buku-siswa', [PageController::class, 'bukusiswa'])->name('bukusiswa.index');
Route::get('/pengaturan-siswa', [PageController::class, 'pengaturansiswa'])->name('pengaturansiswa.index');
Route::get('/peminjaman-siswa', [PageController::class, 'peminjaman'])->name('peminjaman.index');
Route::get('/update-pengaturan-siswa', [PageController::class, 'updatepengaturansiswa'])->name('updatepengaturansiswa.index');


// Dashboard admin
Route::get('/admin', [PagesController::class, 'dashboardAdmin'])->name('dashboardAdmin');
Route::get('/daftar-buku-admin', [PageController::class, 'bukuAdmin'])->name('buku.index');
Route::get('/kategori-buku', [PageController::class, 'kategori_buku'])->name('kategori.index');
Route::get('/rak', [PageController::class, 'rak'])->name('rak.index');
Route::get('/penulis', [PageController::class, 'penulis'])->name('penulis.index');
Route::get('/penerbit', [PageController::class, 'penerbit'])->name('penerbit.index');
Route::get('/peminjaman-admin', [PageController::class, 'peminjamanAdmin'])->name('peminjaman.index');
Route::get('/pengaturan', [PageController::class, 'pengaturan'])->name('pengaturan.index');

//create admin
Route::get('/create-daftar-buku-admin', [PageController::class, 'createbukuAdmin']);
Route::get('/create-kategori-buku', [PageController::class, 'createkategoribuku']);
Route::get('/create-penulis', [PageController::class, 'createpenulis']);
Route::get('/create-penerbit', [PageController::class, 'createpenerbit']);

//update admin
// Route::get('/update-daftar-buku-admin', [PageController::class, 'updatebukuAdmin']);
Route::get('/update-kategori-buku', [PageController::class, 'updatekategoribuku']);
// Route::get('/update-penulis', [PageController::class, 'update_penulis'])->name('updatepenulis');
Route::get('/update-penerbit', [PageController::class, 'updatepenerbit']);
Route::get('/update-peminjaman-admin/{id}', [PageController::class, 'updatepeminjamanadmin'])->name('updatepeminjamanadmin');
Route::get('/update-pengaturan', [PageController::class, 'updatepengaturan']);
Route::get('/register', [PagesController::class, 'registerPage'])->name('register');
Route::get('/register', [PagesController::class, 'register'])->name('register');
Route::get('/login', [PagesController::class, 'login'])->name('login');

//penerbit
Route::post('/create_penerbit', [PenerbitController::class, 'create'])->name('action.createpenerbit');
Route::get('/create_penerbit', [PageController:: class, 'create_penerbit'])->name('create_penerbit');
Route::get('/admin_update_penerbit/{id}', [PagesController::class, 'admin_update_penerbit'])->name('admin_update_penerbit');
Route::patch('/penerbit/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');
Route::delete('/penerbit/{penerbit_id}', [PenerbitController::class, 'delete'])->name('penerbit.delete');

//penulis
Route::post('/create_penulis', [PenulisController::class, 'create'])->name('action.createpenulis');
Route::get('/create_penulis', [PageController:: class, 'create_penulis'])->name('create_penulis');
Route::get('/update_penulis/{id}', [PagesController::class, 'update_penulis'])->name('update_penulis');
Route::patch('/penulis/{id}', [PenulisController::class, 'update'])->name('penulis.update');
Route::delete('/penulis/{penulis_id}', [PenulisController::class, 'delete'])->name('penulis.delete');

//kategori buku
Route::post('/create_kategori_buku', [KategoriBukuController::class, 'create'])->name('action.createkategoribuku');
Route::get('/create_kategori_buku', [PageController:: class, 'create_kategori_buku'])->name('create_kategori_buku');
Route::get('/update_kategori_buku/{id}', [PagesController::class, 'update_kategori_buku'])->name('update_kategori_buku');
Route::patch('/kategori/{id}', [KategoriBukuController::class, 'update'])->name('kategori.update');
Route::delete('/kategori_buku/{kategori_id}', [KategoriBukuController::class, 'delete'])->name('kategori.delete');

//rak
Route::post('/create_rak', [RakController::class, 'create'])->name('action.createrak');
Route::get('/create_rak', [PageController:: class, 'create_rak'])->name('create_rak');
Route::get('/update_rak/{id}', [PagesController::class, 'update_rak'])->name('update_rak');
Route::patch('/rak/{id}', [RakController::class, 'update'])->name('rak.update');
Route::delete('/rak/{rak_id}', [RakController::class, 'delete'])->name('rak.delete');

//buku
Route::post('/create_buku', [BukuController::class, 'create'])->name('action.createbuku');
Route::get('/create_buku', [PageController:: class, 'create_buku'])->name('create_buku');
Route::get('/update_buku/{id}', [PagesController::class, 'update_buku'])->name('update_buku');
Route::patch('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/{buku_id}', [BukuController::class, 'delete'])->name('buku.delete');


//peminjaman
// siswa
Route::post('/peminjaman/{id}', [PeminjamanController::class, 'update'])->name('action.update_peminjaman');
Route::get('/buku-siswa', [PageController::class, 'bukusiswa'])->name('bukusiswa.index');
Route::get('/buku/pinjam/{id}', [PeminjamanDetailController::class, 'store'])->name('buku.pinjam');
Route::get('/peminjaman', [PageController::class, 'peminjaman'])->name('peminjaman.siswa.index');
Route::get('/pengaturan', [PageController::class, 'pengaturan'])->name('pengaturan');
Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('action.delete_peminjaman');

//register siswa
Route::post('/user/register', [UsersController::class, 'register'])->name('user.register');
Route::get('/register', [PagesController::class, 'register_user'])->name('register');
Route::get('/login', [PagesController::class, 'login_user'])->name('login');
Route::post('/user/login', [UsersController::class, 'login'])->name('user.login');
Route::group(['middleware' => 'role'], function () {
    Route::get('/', [PagesController::class, 'dashboard'])->name('dashboard');
});

//register admin
Route::post('/admin/register', [UsersController::class, 'register'])->name('user.register');
Route::get('/registermin', [PagesController::class, 'register_admin'])->name('register');
Route::get('/loginmin', [PagesController::class, 'login_admin'])->name('login');
Route::post('/admin/login', [UsersController::class, 'login'])->name('user.login');
Route::group(['middleware' => 'role'], function () {
    Route::get('/', [PagesController::class, 'admin'])->name('admin');
});