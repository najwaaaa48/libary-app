<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Create a New Book</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <!-- /resources/views/post/create.blade.php -->
 
        <label for="title">Post Title</label>
 
        <input id="title"
            type="text"
            class="@error('title') is-invalid @enderror">
  
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="kode_buku">Kode Buku</label>
                <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="{{ old('kode_buku') }}">
                @error('kode_buku')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_buku">Nama Buku</label>
                <input type="text" class="form-control" id="nama_buku" name="nama_buku" value="{{ old('nama_buku') }}">
                @error('nama_buku')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="penerbit_buku">Penerbit Buku</label>
                <input type="text" class="form-control" id="penerbit_buku" name="penerbit_buku" value="{{ old('penerbit_buku') }}">
                @error('penerbit_buku')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}">
                @error('tahun_terbit')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="penulis_buku">Penulis Buku</label>
                <input type="text" class="form-control" id="penulis_buku" name="penulis_buku" value="{{ old('penulis_buku') }}">
                @error('penulis_buku')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

