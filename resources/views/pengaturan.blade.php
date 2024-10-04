@extends('template.layout')

@if($level == 'admin')
@section('title', 'Dashboard - Admin Perpustakaan')
@elseif($level == 'siswa')
@section('title', 'Dashboard - Perpustakaan')
@endif

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
    <div id="layoutSidenav">
        @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pengaturan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman Pengaturan</li>
                        </ol>
                        <button class="btn btn-warning btn-sm"><a class="nav-link" href="/update-pengaturan">Update data user</button>
                        <form action="">
                            <div class="row gap-3">
                                <div class="col-12 col-md-4 form-group">
                                    <label for="nama" class="form-label">Nama *</label>
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama anda">
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="username" class="form-label">Username *</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username anda">
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="alamat" class="form-label">Alamat *</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat anda">
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email anda">
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="no_hp" class="form-label">Nomor hp *</label>
                                    <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan nomor hp anda">
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="password" class="form-label">Password *</label>
                                    <input type="password" name="password" id="isbn" class="form-control" placeholder="Masukkan Password anda">
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12 col-md-4">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Web Perpustakaan 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
@endsection