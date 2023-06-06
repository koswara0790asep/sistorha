<?php

namespace App\Http\Livewire\Beritaacara;

use App\Models\BeritaAcara;
use App\Models\DfKelas;
use App\Models\DfMatkul;
use App\Models\Dosen;
use App\Models\Jadwal;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{
    public $jadwalId;
    public $matkulSelect;
    public $kelasSelect;
    public $dosenID;

    public $bapId;
    public $hari;
    public $tanggal;
    public $jam_masuk;
    public $jam_keluar;
    public $pembahasan;
    public $jumlah_mhs;
    public $matkul_id;
    public $kelas_id;
    public $pertemuan;

    public function mount(DfKelas $dfkelas, DfMatkul $dfmatkul, Jadwal $jadwal, Dosen $dosen, $id)
    {
        $this->jadwalId = $jadwal->id;
        $this->matkulSelect = $dfmatkul->id;
        $this->kelasSelect = $dfkelas->id;
        $this->dosenID = $dosen->id;

        $bap = BeritaAcara::find($id);

        if ($bap) {
            $this->bapId = $bap->id;
            $this->hari = $bap->hari;
            $this->tanggal = $bap->tanggal;
            $this->jam_masuk = $bap->jam_masuk;
            $this->jam_keluar = $bap->jam_keluar;
            $this->pembahasan = $bap->pembahasan;
            $this->jumlah_mhs = $bap->jumlah_mhs;
            $this->pertemuan = $bap->pertemuan;
        } elseif ($this->bapId == null) {
            Alert::warning('Woops!','Data yang kamu cari tidak ada!');
        }
    }

    public function update()
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

        if ($this->bapId) {
            $bap = BeritaAcara::find($this->bapId);

            if ($bap) {
                $bap->update([
                    'pertemuan' => $this->pertemuan,
                    'hari' => $this->hari,
                    'tanggal' => $this->tanggal,
                    'pembahasan' => $this->pembahasan,
                    'jumlah_mhs' => $this->jumlah_mhs,
                    'jam_masuk' => $this->jam_masuk,
                    'jam_keluar' => $this->jam_keluar,
                    'jumlah_mhs' => $this->jumlah_mhs,
                ]);
            }
        }

        //flash message
        Alert::success('BERHASIL!','Data Pertemuan Berhasil Diperbaharui!');

        // redirect
        return redirect('/beritaacara/'.$this->jadwalId.'/'.$this->matkul_id.'/'.$this->kelas_id.'/'.$this->dosenID.'');
    }

    public function render()
    {
        return view('livewire.beritaacara.edit');
    }
}
