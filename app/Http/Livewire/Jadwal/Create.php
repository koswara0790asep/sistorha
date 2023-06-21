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

class Create extends Component
{
    public $prodi_id;
    public $kelas_id;
    public $semester;
    public $matkul_id;
    public $sks;
    public $jml_jam;
    public $dosen_id;
    public $hari;
    public $jam_awal;
    public $jam_akhir;
    public $ruang_id;

    public function store()
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
            'jam_awal' => 'required',
            'jam_akhir' => 'required',
            'ruang_id' => 'required',
        ]);

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

        $existingData = Jadwal::where('matkul_id', $this->matkul_id)
                              ->where('hari', $hari)
                              ->where('jam_awal', $this->jam_awal)
                              ->where('ruang_id', $this->ruang_id)
                              ->exists();

        if ($existingData) {
            Alert::error('GAGAL!','Data Jadwal Sudah Ada!');
        } else {

            $existingTimeSlot = Jadwal::where('hari', $hari)
                                        ->where('jam_awal', $this->jam_awal)
                                        ->where('ruang_id', $this->ruang_id)
                                        ->exists();

            if ($existingTimeSlot) {
                // Jika ada, tampilkan pesan error
                Alert::error('GAGAL!','Jadwal Hari, Jam, dan Ruangan Sudah Terisi!');
            } else {

                Jadwal::create([
                    'prodi_id' => $this->prodi_id,
                    'kelas_id' => $this->kelas_id,
                    'semester' => $this->semester,
                    'matkul_id' => $this->matkul_id,
                    'sks' => $this->sks,
                    'jml_jam' => $this->jml_jam,
                    'dosen_id' => $this->dosen_id,
                    'hr' => $this->hari,
                    'hari' => $hari,
                    'jam_awal' => $this->jam_awal,
                    'jam_akhir' => $this->jam_akhir,
                    'ruang_id' => $this->ruang_id,
                ]);

                Alert::success('BERHASIL!','Data Jadwal Mata Kuliah ini Berhasil Disimpan!');
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
        return view('livewire.jadwal.create', compact(['prodis','kelases', 'df_matkuls', 'dosens', 'ruangans']));
    }
}
