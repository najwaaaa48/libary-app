@extends('template.layout')

@if ($level == 'admin')
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
                    <h1 class="mt-4">Update Peminjaman</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Update Data Peminjaman</li>
                    </ol>
                    <form action="{{ route('action.update_peminjaman', ['id' => $peminjaman->peminjaman_id ]) }}" method="POST">
                        @csrf
                        <div class="row gap-3">
                            <div class="col-12 col-md-4 form-group">
                                <label class="form-label">Peminjam</label>
                                <input type="text" class="form-control" value="{{ $peminjaman->user->user_nama }}" disabled>
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label class="form-label">Buku</label>
                                <input type="text" class="form-control" value="{{ $peminjaman->buku[0]['buku_judul'] }}" disabled>
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="denda" class="form-label">Denda</label>
                                <input type="number" name="denda" id="denda" class="form-control"
                                    placeholder="Masukkan denda">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" name="catatan" id="catatan" class="form-control"
                                    placeholder="Masukkan catatan">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="status_kembalian" class="form-label">Status Kembalian</label>
                                <input type="text" name="status_kembalian" id="status_kembalian" class="form-control"
                                    placeholder="Masukkan status kembali">
                            </div>
                            <div class="row my-3">
                                <div class="col-12 col-md-4">
                                    <button class="btn btn-primary">Update</button>
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
