<?php

namespace App\Http\Livewire\Jadwal;

use App\Models\DfKelas;
use App\Models\DfMatkul;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\ProgramStudi;
use App\Models\Ruangan;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{

    public $jadwalId;
    public $prodi_id;
    public $kelas_id;
    public $semester;
    public $matkul_id;
    public $sks;
    public $jml_jam;
    public $dosen_id;
    public $hari;
    public $thn_ajar;
    public $jam_awal;
    public $jam_akhir;
    public $ruang_id;

    public function mount($id)
    {
        $jadwal = Jadwal::find($id);

        if ($jadwal) {
            $this->jadwalId = $jadwal->id;
            $this->prodi_id = $jadwal->prodi_id;
            $this->kelas_id = $jadwal->kelas_id;
            $this->semester = $jadwal->semester;
            $this->matkul_id = $jadwal->matkul_id;
            $this->sks = $jadwal->sks;
            $this->jml_jam = $jadwal->jml_jam;
            $this->dosen_id = $jadwal->dosen_id;
            $this->hari = $jadwal->hr;
            $this->thn_ajar = $jadwal->thn_ajar;
            $this->jam_awal = $jadwal->jam_awal;
            $this->jam_akhir = $jadwal->jam_akhir;
            $this->ruang_id = $jadwal->ruang_id;
        } elseif ($this->matkul_id == null) {
            Alert::warning('Woops!','Data yang Anda cari tidak ada!');
        }
    }

    public function update()
    {
        $this->validate([
            'prodi_id' => 'required',
            'kelas_id' => 'required',
            'semester' => 'required',
            'matkul_id' => 'required',
            'jml_jam' => 'required',
            'sks' => 'required',
            'dosen_id' => 'required',
            'hari' => 'required',
            'thn_ajar' => 'required',
            'jam_awal' => 'required',
            'jam_akhir' => 'required',
            'ruang_id' => 'required',

        ]);

        if ($this->jadwalId) {
            $jadwal = Jadwal::find($this->jadwalId);

            if ($this->hari == 1) {
                $hari = 'Senin';
            } elseif ($this->hari == 2) {
                $hari = 'Selasa';
            } elseif ($this->hari == 3) {
                $hari = 'Rabu';
            } elseif ($this->hari == 4) {
                $hari = 'Kamis';
            } elseif ($this->hari == 5) {
                $hari = "Jum'at";
            } elseif ($this->hari == 6) {
                $hari = 'Sabtu';
            } elseif ($this->hari == 7) {
                $hari = 'Minggu/Ahad';
            }

            $existingTimeSlot = Jadwal::where('hari', $hari)
                                        ->where('jam_awal', $this->jam_awal)
                                        ->where('ruang_id', $this->ruang_id)
                                        ->exists();

            if ($existingTimeSlot) {
                // Jika ada, tampilkan pesan error
                Alert::error('GAGAL!','Jadwal Hari, Jam, dan Ruangan sudah ada dalam daftar!');
            }

            if ($jadwal) {
                $jadwal->update([
                    'prodi_id' => $this->prodi_id,
                    'kelas_id' => $this->kelas_id,
                    'semester' => $this->semester,
                    'matkul_id' => $this->matkul_id,
                    'sks' => $this->sks,
                    'jml_jam' => $this->jml_jam,
                    'dosen_id' => $this->dosen_id,
                    'hr' => $this->hari,
                    'hari' => $hari,
                    'thn_ajar' => $this->thn_ajar,
                    'jam_awal' => $this->jam_awal,
                    'jam_akhir' => $this->jam_akhir,
                    'ruang_id' => $this->ruang_id,
                ]);
                //flash message
                Alert::success('BERHASIL!', 'Data Jadwal Mata Kuliah ini Berhasil Diperbaharui!');
            }
        }

        // redirect
        return redirect()->route('jadwal.index');
    }

    public function render()
    {
        $prodis = ProgramStudi::all();
        $kelases = DfKelas::all();
        $df_matkuls = DfMatkul::all();
        $dosens = Dosen::all();
        $ruangans = Ruangan::all();
        return view('livewire.jadwal.edit', compact(['prodis', 'kelases', 'df_matkuls', 'dosens', 'ruangans']));
    }
}
