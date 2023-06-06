<div class="row">
    <div class="col-md-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>
                <b><i class="mdi mdi-alert"></i> Peringatan!</b> <br>Sebaiknya anda mengganti password anda jika masih menggunakan password awal!
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card text-white bg-{{ array_rand($colors) }} mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="mdi mdi-format-list-bulleted-type mdi-36px"></span>
                    <div class="text-end">
                        <h4 class="card-title mb-0">
                        @php
                            $dtDosen = DB::table('dosens')->where('nidn', Auth::user()->username ?? null)->select('dosens.*', 'id')->first();
                            // dd(Auth::user()->username);
                            $jml_jadwal = DB::table('jadwals')->where('dosen_id', $dtDosen->id ?? null)->select('jadwals.*')->get();
                        @endphp
                        {{ count($jml_jadwal) }}
                        </h4>
                        <p class="card-text">Jadwal Saya</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    @if (count($jml_jadwal) == 0)
                    Belum Ada Data <a href="#" class="text-white btn-icon-prepend"><span class="mdi mdi-eye-arrow-right mdi-18px"></span></a>

                    @else

                    Lihat Data <a href="{{ route('jadwal.indexDosen', Auth::user()->username) }}" class="text-white btn-icon-prepend"><span class="mdi mdi-eye-arrow-right mdi-18px"></span></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
