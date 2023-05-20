<?php

namespace App\Http\Livewire\Beritaacara;

use App\Models\BeritaAcara;
use App\Models\DfKelas;
use App\Models\DfMatkul;
use App\Models\Dosen;
use App\Models\Jadwal;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $jadwalId;
    public $matkulSelect;
    public $kelasSelect;
    public $dosenID;

    public $hari;
    public $tanggal;
    public $jam_masuk;
    public $jam_keluar;
    public $pembahasan;
    public $jumlah_mhs;
    public $kelas_id;
    public $matkul_id;
    public $pertemuan;

    public function mount(DfKelas $dfkelas, DfMatkul $dfmatkul, Jadwal $jadwal, Dosen $dosen)
    {
        $this->jadwalId = $jadwal->id;
        $this->matkulSelect = $dfmatkul->id;
        $this->kelasSelect = $dfkelas->id;
        $this->dosenID = $dosen->id;
    }

    public function store()
    {
        $this->validate([
            'hari' => 'required',
            'tanggal' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
            'pembahasan' => 'required',
            'jumlah_mhs' => 'required',
            'pertemuan' => 'required',
        ]);

        $this->matkul_id = $this->matkulSelect;
        $this->kelas_id = $this->kelasSelect;

        $dataExists = BeritaAcara::where('pertemuan', $this->pertemuan)
                                ->where('hari', $this->hari)
                                ->where('tanggal', $this->tanggal)
                                ->where('pembahasan', $this->pembahasan)
                                ->where('kelas_id', $this->kelas_id)
                                ->where('matkul_id', $this->matkul_id)
                                ->exists();

        if (!$dataExists) {
            BeritaAcara::firstOrCreate(
                [
                    'pertemuan' => $this->pertemuan,
                    'hari' => $this->hari,
                    'tanggal' => $this->tanggal,
                    'pembahasan' => $this->pembahasan,
                    'kelas_id' => $this->kelas_id,
                    'matkul_id' => $this->matkul_id,
                ],
                [
                    'jam_masuk' => $this->jam_masuk,
                    'jam_keluar' => $this->jam_keluar,
                    'jumlah_mhs' => $this->jumlah_mhs,
                ]
            );
            //flash message
            Alert::success('BERHASIL!','Data pertemuan berhasil disimpan!');
        } else {
            //flash message
            Alert::error('GAGAL!','Data pertemuan sudah ada, dimohon untuk mengeceknya kembali!');
        }
        // redirect
        return redirect('/beritaacara/'.$this->jadwalId.'/'.$this->matkul_id.'/'.$this->kelas_id.'/'.$this->dosenID.'');
    }

    public function render()
    {
        return view('livewire.beritaacara.create');
    }
}
