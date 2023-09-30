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
        $beritaacara = $this->matkulSelect == null && $this->kelasSelect == null ?
        ''
        :
        BeritaAcara::first()->where('kelas_id', 'like', '%' . $this->kelasSelect . '%')->where( 'matkul_id', 'like', '%' . $this->matkulSelect . '%')->select('berita_acaras.*', 'id', 'pertemuan')->get();

        $lastMeet = count($beritaacara);
        if ($lastMeet == 0) {
            $this->pertemuan = $lastMeet + 1;
        } elseif ($lastMeet == 8) {
            $this->pertemuan = $lastMeet + 2;
        } elseif ($lastMeet >= 8) {
            $this->pertemuan = $lastMeet - 1;
        } else {
            $this->pertemuan = $lastMeet + 1;
        }

        $this->jumlah_mhs = 0;
    }

    public function store()
    {
        $this->validate([
            'tanggal' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required|after:jam_masuk',
            'pembahasan' => 'required',
            'jumlah_mhs' => 'required',
        ]);

        $this->matkul_id = $this->matkulSelect;
        $this->kelas_id = $this->kelasSelect;
        $this->hari = \Carbon\Carbon::parse($this->tanggal)->isoFormat('dddd');

        $pertemuanExists = BeritaAcara::where('pertemuan', $this->pertemuan)
                                    ->where('kelas_id', $this->kelas_id)
                                    ->where('matkul_id', $this->matkul_id)
                                    ->exists();

        $dataExists = BeritaAcara::where('pertemuan', $this->pertemuan)
                                ->where('hari', $this->hari)
                                ->where('tanggal', $this->tanggal)
                                ->where('pembahasan', $this->pembahasan)
                                ->where('kelas_id', $this->kelas_id)
                                ->where('matkul_id', $this->matkul_id)
                                ->exists();
        if ($pertemuanExists) {
            Alert::error('GAGAL!','Data pertemuan sudah ada, dimohon untuk mengeceknya kembali!');
            return redirect('/beritaacara/'.$this->jadwalId.'/'.$this->matkul_id.'/'.$this->kelas_id.'/'.$this->dosenID.'');
        } else {
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
                return redirect('/absensis/'.$this->jadwalId.'/'.$this->kelasSelect.'/'.$this->matkulSelect.'');
            } else {
                //flash message
                Alert::error('GAGAL!','Data pertemuan sudah ada, dimohon untuk mengeceknya kembali!');
                // redirect
                return redirect('/beritaacara/'.$this->jadwalId.'/'.$this->matkul_id.'/'.$this->kelas_id.'/'.$this->dosenID.'');
            }
        }
    }

    public function render()
    {

        return view('livewire.beritaacara.create');
    }
}
