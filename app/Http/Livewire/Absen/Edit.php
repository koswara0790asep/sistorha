<?php

namespace App\Http\Livewire\Absen;

use App\Models\Absent;
use App\Models\BeritaAcara;
use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{
    public $absenId;
    public $matkul_id;
    public $kelas_id;
    public $semester;
    public $nim;
    public $pertemuan1;
    public $pertemuan2;
    public $pertemuan3;
    public $pertemuan4;
    public $pertemuan5;
    public $pertemuan6;
    public $pertemuan7;
    public $pertemuan8;
    public $pertemuan9;
    public $pertemuan10;
    public $pertemuan11;
    public $pertemuan12;
    public $pertemuan13;
    public $pertemuan14;
    public $pertemuan15;
    public $pertemuan16;
    public $pertemuan17;
    public $pertemuan18;
    public $telat1;
    public $telat2;
    public $telat3;
    public $telat4;
    public $telat5;
    public $telat6;
    public $telat7;
    public $telat8;
    public $telat9;
    public $telat10;
    public $telat11;
    public $telat12;
    public $telat13;
    public $telat14;
    public $telat15;
    public $telat16;
    public $telat17;
    public $telat18;
    public $keterangan;

    public $jadwalId;
    public $waktuMasuk;

    public function mount($id, Jadwal $jadwal)
    {
        $this->jadwalId = $jadwal->id;
        $this->waktuMasuk = $jadwal->jam_awal;
        $absen = Absent::find($id);

        if ($absen) {
            $this->absenId = $absen->id;
            $this->matkul_id = $absen->matkul_id;
            $this->kelas_id = $absen->kelas_id;
            $this->semester = $absen->semester;
            $this->nim = $absen->nim;
            $this->telat1 = $absen->telat1;
            $this->telat2 = $absen->telat2;
            $this->telat3 = $absen->telat3;
            $this->telat4 = $absen->telat4;
            $this->telat5 = $absen->telat5;
            $this->telat6 = $absen->telat6;
            $this->telat7 = $absen->telat7;
            $this->telat8 = $absen->telat8;
            $this->telat9 = $absen->telat9;
            $this->telat10 = $absen->telat10;
            $this->telat11 = $absen->telat11;
            $this->telat12 = $absen->telat12;
            $this->telat13 = $absen->telat13;
            $this->telat14 = $absen->telat14;
            $this->telat15 = $absen->telat15;
            $this->telat16 = $absen->telat16;
            $this->telat17 = $absen->telat17;
            $this->telat18 = $absen->telat18;
            $this->pertemuan1 = $absen->pertemuan1;
            $this->pertemuan2 = $absen->pertemuan2;
            $this->pertemuan3 = $absen->pertemuan3;
            $this->pertemuan4 = $absen->pertemuan4;
            $this->pertemuan5 = $absen->pertemuan5;
            $this->pertemuan6 = $absen->pertemuan6;
            $this->pertemuan7 = $absen->pertemuan7;
            $this->pertemuan8 = $absen->pertemuan8;
            $this->pertemuan9 = $absen->pertemuan9;
            $this->pertemuan10 = $absen->pertemuan10;
            $this->pertemuan11 = $absen->pertemuan11;
            $this->pertemuan12 = $absen->pertemuan12;
            $this->pertemuan13 = $absen->pertemuan13;
            $this->pertemuan14 = $absen->pertemuan14;
            $this->pertemuan15 = $absen->pertemuan15;
            $this->pertemuan16 = $absen->pertemuan16;
            $this->pertemuan17 = $absen->pertemuan17;
            $this->pertemuan18 = $absen->pertemuan18;
            $this->keterangan = $absen->keterangan;

        } elseif ($this->jadwalId == null) {
            Alert::warning('Woops!','Data yang kamu cari tidak ada!');
        }
    }

    public function update()
    {

        if ($this->absenId) {
            $absen = Absent::find($this->absenId);

            $p1 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '1')
                    ->exists();
            $p2 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '2')
                    ->exists();
            $p3 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '3')
                    ->exists();
            $p4 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '4')
                    ->exists();
            $p5 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '5')
                    ->exists();
            $p6 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '6$p6')
                    ->exists();
            $p7 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '7')
                    ->exists();
            $p8 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '8')
                    ->exists();
            $p10 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '10')
                    ->exists();
            $p11 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '11$p11')
                    ->exists();
            $p12 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '12')
                    ->exists();
            $p13 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '13')
                    ->exists();
            $p14 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '14')
                    ->exists();
            $p15 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '15')
                    ->exists();
            $p16 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '16')
                    ->exists();
            $p17 = DB::table('berita_acaras')
                    ->where('kelas_id', $this->kelas_id ?? '')
                    ->where('matkul_id', $this->matkul_id ?? '')
                    ->where('pertemuan', '17')
                    ->exists();


            if ($p1) {
                if ($absen->pertemuan1 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '1')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan1 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p2) {
                if ($absen->pertemuan2 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '2')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan2 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p3) {
                if ($absen->pertemuan3 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '3')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $beritaacara->jumlah_mhs + 1;

                    if ($this->pertemuan3 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p4) {
                if ($absen->pertemuan4 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '4')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan4 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p5) {
                if ($absen->pertemuan5 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '5')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan5 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p6) {
                if ($absen->pertemuan6 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '6')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan6 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p7) {
                if ($absen->pertemuan7 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '7')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan7 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p8) {
                if ($absen->pertemuan8 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '8')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan8 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p10) {
                if ($absen->pertemuan10 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '10')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan10 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p11) {
                if ($absen->pertemuan11 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '11')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan11 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p12) {
                if ($absen->pertemuan12 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '12')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan12 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p13) {
                if ($absen->pertemuan13 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '13')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan13 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p14) {
                if ($absen->pertemuan14 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '14')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan14 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p15) {
                if ($absen->pertemuan15 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '15')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan15 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p16) {
                if ($absen->pertemuan16 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '16')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan16 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }
            }
            if ($p17) {
                if ($absen->pertemuan17 != 'Hadir') {

                    $beritaacara = DB::table('berita_acaras')
                                    ->where('kelas_id', $this->kelas_id ?? '')
                                    ->where('matkul_id', $this->matkul_id ?? '')
                                    ->where('pertemuan', '17')
                                    ->select('berita_acaras.*', 'id', 'jumlah_mhs')
                                    ->first();

                    $bap = BeritaAcara::find($beritaacara->id);

                    $lastSum = $bap->jumlah_mhs + 1;

                    if ($this->pertemuan17 == 'Hadir') {
                        if ($bap) {
                            $bap->update([
                                'jumlah_mhs' => $lastSum,
                            ]);
                        }
                    }
                }

            }

            if ($absen) {
                $absen->update([
                    'matkul_id' => $this->matkul_id,
                    'kelas_id' => $this->kelas_id,
                    'semester' => $this->semester,
                    'nim' => $this->nim,
                    'pertemuan1' => $this->pertemuan1,
                    'pertemuan2' => $this->pertemuan2,
                    'pertemuan3' => $this->pertemuan3,
                    'pertemuan4' => $this->pertemuan4,
                    'pertemuan5' => $this->pertemuan5,
                    'pertemuan6' => $this->pertemuan6,
                    'pertemuan7' => $this->pertemuan7,
                    'pertemuan8' => $this->pertemuan8,
                    'pertemuan9' => $this->pertemuan9,
                    'pertemuan10' => $this->pertemuan10,
                    'pertemuan11' => $this->pertemuan11,
                    'pertemuan12' => $this->pertemuan12,
                    'pertemuan13' => $this->pertemuan13,
                    'pertemuan14' => $this->pertemuan14,
                    'pertemuan15' => $this->pertemuan15,
                    'pertemuan16' => $this->pertemuan16,
                    'pertemuan17' => $this->pertemuan17,
                    'pertemuan18' => $this->pertemuan18,
                    'telat1' => $this->telat1,
                    'telat2' => $this->telat2,
                    'telat3' => $this->telat3,
                    'telat4' => $this->telat4,
                    'telat5' => $this->telat5,
                    'telat6' => $this->telat6,
                    'telat7' => $this->telat7,
                    'telat8' => $this->telat8,
                    'telat9' => $this->telat9,
                    'telat10' => $this->telat10,
                    'telat11' => $this->telat11,
                    'telat12' => $this->telat12,
                    'telat13' => $this->telat13,
                    'telat14' => $this->telat14,
                    'telat15' => $this->telat15,
                    'telat16' => $this->telat16,
                    'telat17' => $this->telat17,
                    'telat18' => $this->telat18,
                    'keterangan' => $this->keterangan,
                ]);
            }

        }


        //flash message
        Alert::success('BERHASIL!', 'Absen berhasil diinputkan!');

        // redirect
        return redirect('/absensis/'.$this->jadwalId.'/'.$this->kelas_id.'/'.$this->matkul_id.'');
    }

    public function render()
    {

        return view('livewire.absen.edit');
    }
}
