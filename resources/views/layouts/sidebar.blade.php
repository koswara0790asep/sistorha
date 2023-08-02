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
            <li class="nav-item nav-category">Olah Data</li>
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
                        {{-- <li class="nav-item">
                            <a href="{{ route('kelas.index') }}" class="nav-link">Kelas</a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('kelasmhs.index') }}" class="nav-link">Kelas Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ruangan.index') }}" class="nav-link">Ruangan</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dfmatkul.index') }}" class="nav-link">Daftar Mata Kuliah</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('jadwal.index') }}" class="nav-link">Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('absen.index') }}" class="nav-link">Monitoring Kehadiran</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('manualbook.akademik') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Manual Book / Tutorial</span>
                </a>
            </li>
            @elseif (Auth::user()->role == 'dosen')
            <li class="nav-item nav-category">Main Menu Dosen</li>
            <li class="nav-item">
                <a href="{{ route('dashboard.dosen') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">web apps</li>
            <li class="nav-item">
                <li class="nav-item">
                    @php
                        $dtDosen = DB::table('dosens')->where('nik', Auth::user()->username)->select('dosens.*', 'id')->first() ?? DB::table('dosens')->where('nidn', Auth::user()->username)->select('dosens.*', 'id')->first();
                    @endphp
                    <a href="{{ route('jadwal.indexDosen', $dtDosen->id) }}" class="nav-link">
                        <i class="link-icon" data-feather="book"></i>
                        <span class="link-title">Jadwal Saya</span>
                    </a>
                </li>
            </li>
            <li class="nav-item">
                <a href="{{ route('manualbook.dosen') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Manual Book / Tutorial</span>
                </a>
            </li>
            @elseif (Auth::user()->role == 'prodi')
            <li class="nav-item nav-category">Main Menu Prodi</li>
            <li class="nav-item">
                <a href="{{ route('dashboard.prodi') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Olah Data</li>
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
                            <a href="{{ route('mahasiswa.index') }}" class="nav-link">Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dosen.index') }}" class="nav-link">Dosen</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dfkelas.index') }}" class="nav-link">Daftar Kelas</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('kelasmhs.index') }}" class="nav-link">Kelas Mahasiswa</a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('dfmatkul.index') }}" class="nav-link">Daftar Mata Kuliah</a>
                        </li>
                        @php
                            $dtProdi = DB::table('program_studies')->where('kode', Auth::user()->username ?? '')->select('program_studies.*', 'id')->first();
                        @endphp
                        <li class="nav-item">
                            <a href="{{ route('jadwal.indexProdi', $dtProdi->id) }}" class="nav-link">Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('absen.index') }}" class="nav-link">Monitoring Kehadiran</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('manualbook.prodi') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Manual Book / Tutorial</span>
                </a>
            </li>
            @elseif (Auth::user()->role == 'mahasiswa')
            @php
                $dtMhs = DB::table('mahasiswas')->where('nim', Auth::user()->username ?? null)->select('mahasiswas.*', 'id')->first();
                $dtKls = DB::table('kelas_mhsws')->where('mahasiswa_id', $dtMhs->id ?? null)->select('kelas_mhsws.*', 'kelas_id')->orderBy('created_at', 'desc')->first();
            @endphp
            <li class="nav-item nav-category">Main Menu Mahasiswa</li>
            <li class="nav-item">
                <a href="{{ route('dashboard.mahasiswa') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">web apps</li>
            <li class="nav-item">
                @if ($dtKls == null)
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="link-icon" data-feather="book"></i>
                        <span class="link-title">Tidak Ada Kelas</span>
                    </a>
                </li>
                @else

                <li class="nav-item">
                    <a href="{{ route('jadwal.indexMhs', $dtKls->kelas_id) }}" class="nav-link">
                        <i class="link-icon" data-feather="book"></i>
                        <span class="link-title">Jadwal Saya</span>
                    </a>
                </li>
                @endif
            </li>
            <li class="nav-item">
                <a href="{{ route('manualbook.mahasiswa') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Manual Book / Tutorial</span>
                </a>
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
