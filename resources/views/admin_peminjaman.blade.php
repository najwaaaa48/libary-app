@extends('template.layout')

@section('title', 'Halaman Peminjaman')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Peminjaman</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Data Peminjaman</li>
                    </ol>
    
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('updated'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('updated') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('deledet'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('deleted') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
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
                                    <th scope="row">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjaman as $peminjaman)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $penerbit->penerbit_id }}</td> --}}
                                        <td>{{ $peminjaman->user->user_nama }}</td>
                                        <td>{{ $peminjaman->buku[0]['buku_judul'] }}</td>
                                        <td>{{ $peminjaman->peminjaman_tglpinjam }}</td>
                                        <td>{{ $peminjaman->peminjaman_tglkembali }}</td>
                                        <td>{{ $peminjaman->peminjaman_statuskembalian }}</td>
                                        <td>{{ $peminjaman->peminjaman_note }}</td>
                                        <td>{{ $peminjaman->peminjaman_denda }}</td>
                                        <td>
                                            <div class="d-flex flex-row mb-3">
                                                <a href="{{ route('updatepeminjamanadmin', ['id' => $peminjaman->peminjaman_id ]) }}" class="px-2">
                                                    <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                                </a>
                                                <!-- {{-- <button class="btn btn-danger"><i class="fas fa-trash"></i></button> --}} -->
                                                <form action="{{ route('action.delete_peminjaman', ["id" => $peminjaman->peminjaman_id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
            @include('template.footer')
        </div>
    </div>
@endsection
