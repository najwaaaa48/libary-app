@extends('template.layout')

@if ($level == 'admin')
    @section('title', 'Daftar Buku - Admin Perpustakaan')
@elseif($level == 'siswa')
    @section('title', 'Daftar Buku - Perpustakaan')
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
                    <h1 class="mt-4">Buku</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Update Data Buku</li>
                    </ol>
                    <form action="{{ route('buku.update', ['id' => $buku->buku_id]) }}" class="row my-4 gap-3" method="post">
                        @csrf
                        @method('PATCH')
                        {{-- <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="id" class="form-label">ID Buku</label>
                            <input type="text" name="id" id="id" class="form-control" placeholder="Masukkan nama penerbit" value="{{ $buku->buku_id }}">
                        </div> --}}
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="penulis" class="form-label">Penulis</label>
                            <select name="buku_penulis_id" id="penulis" class="form-control">
                                <option value="<?=$buku->penulis['penulis_id']?>"><?=$buku->penulis['penulis_nama']?></option>
                                <?php foreach ($penulis as $p) { ?>
                                <option value="<?= $p->penulis_id ?>"><?= $p->penulis_nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="buku_kategori_id" id="kategori" class="form-control">
                                <option value="<?=$buku->kategori['kategori_id']?>"><?=$buku->kategori['kategori_nama']?></option>
                                <?php foreach ($kategori as $p) { ?>
                                <option value="<?= $p->kategori_id ?>"><?= $p->kategori_nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <select name="buku_penerbit_id" id="penerbit" class="form-control">
                                <option value="<?=$buku->penerbit['penerbit_id']?>"><?=$buku->penerbit['penerbit_nama']?></option>
                                <?php foreach ($penerbit as $p) { ?>
                                <option value="<?= $p->penerbit_id ?>"><?= $p->penerbit_nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="rak" class="form-label">Rak</label>
                            <select name="buku_rak_id" id="rak" class="form-control">
                                <option value="<?=$buku->rak['rak_id']?>"><?=$buku->rak['rak_nama']?></option>
                                <?php foreach ($rak as $p) { ?>
                                <option value="<?= $p->rak_id ?>"><?= $p->rak_nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="judul" class="form-label">Judul Buku</label>
                            <input type="text" name="buku_judul" id="judul" class="form-control"
                                placeholder="Masukkan  judul buku"value="{{ $buku->buku_judul }}">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="isbn" class="form-label">Buku ISBN</label>
                            <input type="text" name="buku_isbn" id="isbn" class="form-control"
                                placeholder="Masukkan  isbn"value="{{ $buku->buku_isbn }}">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="thnpenerbit" class="form-label">Tahun Terbit Buku</label>
                            <input type="text" name="buku_thnpenerbit" id="thnpenerbit" class="form-control"
                                placeholder="Masukkan  tahun terbit"value="{{ $buku->buku_thnpenerbit }}">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <button class="btn btn-success" type="submit">Update</button>
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