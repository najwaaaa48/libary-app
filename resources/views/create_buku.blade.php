@extends('template.layout')

@section('title', 'Tambah Buku - Admin Perpustakaan')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Buku</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Tambah Buku</li>
                    </ol>
                    <form action="{{ route('action.createbuku') }}" class="row my-4 gap-3"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- mulai input biasa -->
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="buku_judul" class="form-label">Judul Buku</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="buku_judul" name="buku_judul" placeholder="Masukkan Judul buku"
                                    required>
                                @error('buku_judul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="buku_isbn" class="form-label">ISBN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="buku_isbn" name="buku_isbn" placeholder="Masukkan ISBN "
                                    required>
                                @error('buku_isbn')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="buku_thnpenerbit" class="form-label">Tahun Penerbit</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="buku_thnpenerbit" name="buku_thnpenerbit"
                                    placeholder="Masukkan tahun penerbit" required>
                                @error('buku_thnpenerbit')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="buku_gambar" class="form-label">Gambar Cover (opsional)</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="buku_gambar" name="buku_gambar">
                            </div>
                        </div>
                        <!-- selesai input biasa -->

                        <!-- mulai input foreign key select -->
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="buku_penulis_id" class="form-label">Penulis Buku *</label>
                            <div class="col-sm-10">
                                <select name="buku_penulis_id" id="buku_penulis_id" class="form-control">
                                    <option selected value="">
                                        -Pilih Penulis Buku-
                                    </option>
                                    @foreach ($data['penulis'] as $item)
                                        <option value={{ $item->penulis_id }}>
                                            {{ $item->penulis_nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('buku_penulis_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="buku_kategori_id" class="form-label">Kategori Buku *</label>
                            <div class="col-sm-10">
                                <select name="buku_kategori_id" id="buku_kategori_id" class="form-control">
                                    <option selected value="">
                                        -Pilih Kategori Buku-
                                    </option>
                                    @foreach ($data['kategori'] as $item)
                                        <option value={{ $item->kategori_id }}>
                                            {{ $item->kategori_nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('buku_kategori_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="buku_penerbit_id" class="form-label">Penerbit Buku *</label>
                            <div class="col-sm-10">
                                <select name="buku_penerbit_id" id="buku_penerbit_id" class="form-control">
                                    <option selected value="">
                                        -Pilih Penerbit Buku-
                                    </option>
                                    @foreach ($data['penerbit'] as $item)
                                        <option value={{ $item->penerbit_id }}>
                                            {{ $item->penerbit_nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('buku_penerbit_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="buku_rak_id" class="form-label">Rak Buku *</label>
                            <div class="col-sm-10">
                                <select name="buku_rak_id" id="buku_rak_id" class="form-control">
                                    <option selected value="">
                                        -Pilih Rak Buku-
                                    </option>
                                    @foreach ($data['rak'] as $item)
                                        <option value={{ $item->rak_id }}>
                                            {{ $item->rak_nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('buku_rak_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <!-- mulai selesai foreign key select -->
                        <div class="form-group col-12 col-md-6 col-lg-4">
                        <button type="submit" class="btn btn-primary">Tambah Buku</button>
                        <a href="" class="btn btn-secondary">Cancel</a>
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