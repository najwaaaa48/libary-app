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
            <div class="container-fluid py-4 px-4">
                <h1 class="mt-4">Dashboard Siswa</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Dashboard Siswa</li>
                    </ol>
                    <h2 @style([
                        'color: green' => $level == 'admin',
                        'color: red' => $level == 'siswa',
                    ])>Selamat datang, {{ $level }}</h2>      
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




<!-- <h1 class="mt-4">Dashboard Siswa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman Dashboard Siswa</li>
                            <h2 @style([
                        'color: green' => $level == 'admin',
                        'color: red' => $level == 'siswa',
                    ])>Selamat datang, {{ $level }}</h2>
                        </ol> -->