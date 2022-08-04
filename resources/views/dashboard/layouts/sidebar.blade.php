<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-danger">
                <li class="nav-item" id="dashboard">
                    <a href="{{ url('/dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (in_array(Auth::user()->role, ['admin', 'kurikulum', 'dosen']))
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Divisi Kurikulum</h4>
                    </li>
                    <li class="nav-item" id="kurikulum-kurikulum">
                        <a href="{{ url('/divisi-kurikulum/kurikulum') }}">
                            <i class="fas fa-book"></i>
                            <p>Kurikulum</p>
                        </a>
                    </li>
                    <li class="nav-item" id="kurikulum-modul">
                        <a href="{{ url('/divisi-kurikulum/modul') }}">
                            <i class="fas fa-book"></i>
                            <p>Modul</p>
                        </a>
                    </li>
                    <li class="nav-item" id="kurikulum-bahan-ajar">
                        <a href="{{ url('/divisi-kurikulum/bahan-ajar') }}">
                            <i class="fas fa-book"></i>
                            <p>Bahan Ajar</p>
                        </a>
                    </li>
                    <li class="nav-item" id="kurikulum-rps">
                        <a href="{{ url('/divisi-kurikulum/rps') }}">
                            <i class="fas fa-book"></i>
                            <p>RPS</p>
                        </a>
                    </li>
                    <li class="nav-item" id="kurikulum-monitoring">
                        <a href="{{ url('/divisi-kurikulum/monitoring') }}">
                            <i class="fas fa-desktop"></i>
                            <p>Monitoring</p>
                        </a>
                    </li>
                    <li class="nav-item" id="kurikulum-arsip">
                        <a href="{{ url('/divisi-kurikulum/arsip') }}">
                            <i class="fas fa-folder-open"></i>
                            <p>Arsip</p>
                        </a>
                    </li>
                @endif
                @if (in_array(Auth::user()->role, ['admin', 'penelitian', 'dosen']))
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Divisi Penelitian</h4>
                    </li>
                    <li class="nav-item" id="penelitian-penelitian">
                        <a href="{{ url('/divisi-penelitian/penelitian') }}">
                            <i class="fas fa-search"></i>
                            <p>Penelitian</p>
                        </a>
                    </li>
                    <li class="nav-item" id="penelitian-pengabdian">
                        <a href="{{ url('/divisi-penelitian/pengabdian') }}">
                            <i class="fas fa-people-carry"></i>
                            <p>Pengabdian</p>
                        </a>
                    </li>
                    <li class="nav-item" id="penelitian-arsip">
                        <a href="{{ url('/divisi-penelitian/arsip') }}">
                            <i class="fas fa-folder-open"></i>
                            <p>Arsip</p>
                        </a>
                    </li>
                @endif

                @if (in_array(Auth::user()->role, ['admin', 'kerja_sama', 'dosen']))
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Divisi Jurnal</h4>
                    </li>
                    <li class="nav-item" id="jurnal-arsip">
                        <a href="{{ url('divisi-jurnal/arsip') }}">
                            <i class="fas fa-folder-open"></i>
                            <p>Arsip</p>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role != 'dosen')
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Berita</h4>
                    </li>
                    <li class="nav-item" id="berita-berita">
                        <a href="{{ url('/berita/berita') }}">
                            <i class="far fa-newspaper"></i>
                            <p>Berita</p>
                        </a>
                    </li>
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item" id="berita-kategori">
                            <a href="{{ url('/berita/kategori') }}">
                                <i class="far fa-list-alt"></i>
                                <p>Kategori Berita</p>
                            </a>
                        </li>
                    @endif
                @endif

                @if (Auth::user()->role == 'admin')
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Manajemen Web</h4>
                    </li>
                    <li class="nav-item" id="manajemen-web-tampilan-beranda">
                        <a href="{{ url('/manajemen-web/tampilan-beranda') }}">
                            <i class="fas fa-images"></i>
                            <p>Tampilan Beranda</p>
                        </a>
                    </li>
                    <li class="nav-item" id="manajemen-web-sejarah">
                        <a href="{{ url('/manajemen-web/sejarah') }}">
                            <i class="fas fa-history"></i>
                            <p>Sejarah UPSP</p>
                        </a>
                    </li>
                    <li class="nav-item" id="manajemen-web-visi-misi">
                        <a href="{{ url('/manajemen-web/visi-misi') }}">
                            <i class="fas fa-bullseye"></i>
                            <p>Visi Misi UPSP</p>
                        </a>
                    </li>
                    <li class="nav-item" id="manajemen-web-struktur-organisasi">
                        <a href="{{ url('/manajemen-web/struktur-organisasi') }}">
                            <i class="fas fa-sitemap"></i>
                            <p>Struktur Organisasi</p>
                        </a>
                    </li>
                    <li class="nav-item" id="manajemen-web-tupoksi">
                        <a href="{{ url('/manajemen-web/tupoksi') }}">
                            <i class="fas fa-briefcase"></i>
                            <p>Tupoksi UPSP</p>
                        </a>
                    </li>
                    <li class="nav-item" id="manajemen-web-kontak">
                        <a href="{{ url('/manajemen-web/kontak') }}">
                            <i class="fas fa-phone"></i>
                            <p>Kontak</p>
                        </a>
                    </li>
                    {{-- @if (Auth::user()->role == 'Admin') --}}
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Master Data</h4>
                    </li>
                    <li class="nav-item" id="master-akun">
                        <a href="{{ url('/master-data/akun') }}">
                            <i class="fas fa-user-circle"></i>
                            <p>Akun</p>
                        </a>
                    </li>
                    <li class="nav-item" id="master-golongan">
                        <a href="{{ url('/master-data/golongan') }}">
                            <i class="fas fa-layer-group"></i>
                            <p>Golongan / Ruang</p>
                        </a>
                    </li>
                    <li class="nav-item" id="master-jabatan-fungsional">
                        <a href="{{ url('/master-data/jabatan-fungsional') }}">
                            <i class="fas fa-briefcase"></i>
                            <p>Jabatan Fungsional</p>
                        </a>
                    </li>
                    <li class="nav-item" id="master-prodi">
                        <a href="{{ url('/master-data/prodi') }}">
                            <i class="fas fa-graduation-cap"></i>
                            <p>Program Studi</p>
                        </a>
                    </li>
                    <li class="nav-item" id="master-skema-penelitian">
                        <a href="{{ url('/master-data/skema-penelitian') }}">
                            <i class="fas fa-search"></i>
                            <p>Skema Penelitian</p>
                        </a>
                    </li>
                    <li class="nav-item" id="master-skema-pengabdian">
                        <a href="{{ url('/master-data/skema-pengabdian') }}">
                            <i class="fas fa-people-carry"></i>
                            <p>Skema Pengabdian</p>
                        </a>
                    </li>
                    <li class="nav-item" id="master-sumber-dana">
                        <a href="{{ url('/master-data/sumber-dana') }}">
                            <i class="fas fa-money-check"></i>
                            <p>Sumber Dana</p>
                        </a>
                    </li>
                    {{-- @endif --}}
                @endif
            </ul>

        </div>
    </div>
</div>
<!-- End Sidebar -->
