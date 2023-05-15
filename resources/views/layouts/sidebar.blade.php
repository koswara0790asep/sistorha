<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            SISTOR <span>TEDC</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            @guest
            <li class="nav-item nav-category">Anda harus login terlebih dahulu !</li>
            <li class="nav-item mt-2">
                <a href="/login" class="nav-link">
                    <i class="link-icon" data-feather="log-in"></i>
                    <span class="link-title">Login</span>
                </a>
            </li>
            @else
            @if (Auth::user()->role == 'akademik')
            <li class="nav-item nav-category">Main Menu {{ Auth::user()->role }}</li>
            <li class="nav-item">
                <a href="{{ route('dashboard.akademik') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#olah" role="button" aria-expanded="false"
                    aria-controls="olah">
                    <i class="link-icon" data-feather="database"></i>
                    <span class="link-title">Olah Data</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="olah">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">User</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mahasiswa.index') }}" class="nav-link">Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dosen.index') }}" class="nav-link">Dosen</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('programstudi.index') }}" class="nav-link">Program Studi</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dfkelas.index') }}" class="nav-link">Daftar Kelas</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kelas.index') }}" class="nav-link">Kelas</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kelasmhs.index') }}" class="nav-link">Kelas Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ruangan.index') }}" class="nav-link">Ruangan</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dfmatkul.index') }}" class="nav-link">Daftar Matakuliah</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="/matkuls" class="nav-link">Matakuliah</a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('jadwal.index') }}" class="nav-link">Jadwal</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="/jadwalkuliahs" class="nav-link">Jadwal Kuliah</a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('absen.index') }}" class="nav-link">Absensi</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="/beritaacaras" class="nav-link">Berita Acara</a>
                        </li> --}}
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Manual Book / Tutorial</span>
                </a>
            </li>
            @elseif (Auth::user()->role == 'dosen')
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">web apps</li>
            <li class="nav-item">
                <li class="nav-item">
                    <a href="/jadwals/{{ Auth::user()->username }}" class="nav-link">
                        <i class="link-icon" data-feather="book"></i>
                        <span class="link-title">Jadwal Saya</span>
                    </a>
                </li>
            </li>
            {{-- @elseif (Auth::user()->role == 'akademik')
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">web apps</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Email</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/email/inbox.html" class="nav-link">Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/email/read.html" class="nav-link">Read</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/email/compose.html" class="nav-link">Compose</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            @elseif (Auth::user()->role == 'prodi')
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">web apps</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Email</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/email/inbox.html" class="nav-link">Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/email/read.html" class="nav-link">Read</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/email/compose.html" class="nav-link">Compose</a>
                        </li>
                    </ul>
                </div>
            </li>
            @else
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            @endif
            @endguest
        </ul>
    </div>
</nav>
<nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted mb-2">Sidebar:</h6>
        <div class="mb-3 pb-3 border-bottom">
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                    value="sidebar-light" checked>
                <label class="form-check-label" for="sidebarLight">
                    Light
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                    value="sidebar-dark">
                <label class="form-check-label" for="sidebarDark">
                    Dark
                </label>
            </div>
        </div>
    </div>
</nav>
