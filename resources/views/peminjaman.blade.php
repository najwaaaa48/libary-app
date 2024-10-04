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
                        <h1 class="mt-4">Peminjaman Buku</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman Peminjaman Buku</li>
                        </ol>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="row">No</th>
                                        <th scope="row">Nama Peminjam</th>
                                        <th scope="row">Buku</th>
                                        <th scope="row">Tanggal Pinjam</th>
                                        <th scope="row">Tanggal Kembali</th>
                                        <th scope="row">Status Kembalian</th>
                                        <th scope="row">Note</th>
                                        <th scope="row">Denda</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjaman as $peminjaman)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            {{-- <td>{{ $penerbit->penerbit_id }}</td> --}}
                                            <td>{{ $peminjaman->buku_content->buku_judul }}</td>
                                            <td>{{ $peminjaman->peminjaman_content->peminjaman_tglpinjam }}</td>
                                            <td>{{ $peminjaman->peminjaman_content->peminjaman_tglkembali }}</td>
                                            <td>{{ $peminjaman->peminjaman_content->peminjaman_statuskembalian }}</td>
                                            <td>{{ $peminjaman->peminjaman_content->peminjaman_note }}</td>
                                            <td>{{ $peminjaman->peminjaman_content->peminjaman_denda }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>    



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