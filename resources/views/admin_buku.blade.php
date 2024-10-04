@extends('template.layout')

@section('title', 'Halaman Buku')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Buku</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Data Buku</li>
                </ol>
                <a href="{{ route('create_buku') }}">
                    <button class="btn btn-primary my-3">Tambah Buku</button>
                </a>
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
                                <th scope="row">Penulis Buku</th>
                                <th scope="row">Penerbit Buku</th>
                                <th scope="row">Kategori Buku</th>
                                <th scope="row">Judul Buku</th>
                                <th scope="row">ISBN</th>
                                <th scope="row">Tahun Penerbit</th>    
                                <th scope="row">Rak Buku</th>
                                <th scope="row">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $buku)    
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $buku->penulis_nama }}</td>
                                <td>{{ $buku->penerbit_nama }}</td>
                                <td>{{ $buku->kategori_nama }}</td>
                                <td>{{ $buku->buku_judul }}</td>
                                <td>{{ $buku->buku_isbn }}</td>
                                <td>{{ $buku->buku_thnpenerbit }}</td>
                                <td>{{ $buku->rak_nama }}</td>
                                <td>
                                <div class="d-flex flex-row mb-3">
                                    <a href="{{ route('update_buku', ['id' => $buku->buku_id]) }}" class="px-2">
                                    <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                    </a>
                                    <!-- {{-- <button class="btn btn-danger"><i class="fas fa-trash"></i></button> --}} -->
                                    <form action="{{ route('buku.delete', ['buku_id' => $buku->buku_id]) }}"method="POST">
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