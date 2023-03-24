<?php

namespace App\Http\Livewire\Absen;

use App\Models\Absent;
use Livewire\Component;

class Edit extends Component
{
    public $absenId;
    public $nim;
    public $kode_matkul;
    public $nama;
    public $kelas;
    public $tm1;
    public $tm2;
    public $tm3;
    public $tm4;
    public $tm5;
    public $tm6;
    public $tm7;
    public $tm8;
    public $tm9;
    public $p1;
    public $p2;
    public $p3;
    public $p4;
    public $p5;
    public $p6;
    public $p7;
    public $p8;
    public $p9;

    public function mount($id)
    {
        $absen = Absent::find($id);

        if ($absen) {
            $this->absenId = $absen->id;
            $this->nim = $absen->nim;
            $this->kode_matkul = $absen->kode_matkul;
            $this->nama = $absen->nama;
            $this->kelas = $absen->kelas;
            $this->tm1 = $absen->tm1;
            $this->tm2 = $absen->tm2;
            $this->tm3 = $absen->tm3;
            $this->tm4 = $absen->tm4;
            $this->tm5 = $absen->tm5;
            $this->tm6 = $absen->tm6;
            $this->tm7 = $absen->tm7;
            $this->tm8 = $absen->tm8;
            $this->tm9 = $absen->tm9;
            $this->p1 = $absen->p1;
            $this->p2 = $absen->p2;
            $this->p3 = $absen->p3;
            $this->p4 = $absen->p4;
            $this->p5 = $absen->p5;
            $this->p6 = $absen->p6;
            $this->p7 = $absen->p7;
            $this->p8 = $absen->p8;
            $this->p9 = $absen->p9;

        }
    }

    public function update()
    {
        $this->validate([
            'nim' => 'required',
            'kode_matkul' => 'required',
            'nama' => 'required',
            'kelas' => 'required',

        ]);

        if ($this->absenId) {
            $absen = Absent::find($this->absenId);

            if ($absen) {
                $absen->update([
                    'nim' => $this->nim,
                    'kode_matkul' => $this->kode_matkul,
                    'nama' => $this->nama,
                    'kelas' => $this->kelas,
                    'p1' => $this->p1,
                    'p2' => $this->p2,
                    'p3' => $this->p3,
                    'p4' => $this->p4,
                    'p5' => $this->p5,
                    'p6' => $this->p6,
                    'p7' => $this->p7,
                    'p8' => $this->p8,
                    'p9' => $this->p9,

                ]);
            }
        }

        //flash message
        session()->flash('message', 'Data absen ' . $this->nama . ' Berhasil Diperbaharui!');

        // redirect
        return redirect()->route('absen.index');
    }

    public function render()
    {
        return view('livewire.absen.edit', [
            'absent' => Absent::get()->all(),
        ]);
    }
}
