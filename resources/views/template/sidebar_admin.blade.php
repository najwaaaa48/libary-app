<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>
                @if($level == 'siswa')
                <a class="nav-link" href="/dashboard">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    Dashboard
                </a>
                <a class="nav-link" href="/buku-siswa">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    Buku
                <a class="nav-link" href="/peminjaman-siswa">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-clipboard"></i>
                    </div>
                    Peminjaman
                </a>
                <a class="nav-link" href="/pengaturan-siswa">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-gear"></i>
                    </div>
                    Pengaturan
                </a>
                <a class="nav-link" href="/register">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-right-from-bracket"></i>
                    </div>
                    Logout
                </a>
                @elseif($level == 'admin')
                <a class="nav-link" href="/admin">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    Dashboard
                </a>
                <a class="nav-link" href="/daftar-buku-admin">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    Buku
                </a>
                <a class="nav-link" href="/rak">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    Rak    
                </a>
                <a class="nav-link" href="/kategori-buku">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    Kategori Buku
                </a>
                <a class="nav-link" href="/penulis">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-pencil"></i>
                    </div>
                    Penulis
                </a>
                <a class="nav-link" href="/penerbit">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-house"></i>
                    </div>
                    Penerbit
                </a>
                <a class="nav-link" href="/peminjaman-admin">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-hand"></i>
                    </div>
                    Peminjaman
                </a>
                <a class="nav-link" href="/pengaturan">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-gear"></i>
                    </div>
                    Pengaturan
                </a>
                <a class="nav-link" href="/register">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-right-from-bracket"></i>
                    </div>
                    Logout
                </a>
                @endif
            </div>
        </div>
        @if ($level == 'siswa')
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Siswa Perpustakaan
        </div>
        @elseif ($level == 'admin')
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Admin Perpustakaan
        </div>
        @endif
    </nav>
</div>