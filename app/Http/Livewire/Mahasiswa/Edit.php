<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\Mahasiswa;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{
    public $mahasiswaId;
    public $nama;
    public $nim;
    public $kelas;
    public $tanggal_lahir;
    public $tempat_lahir;
    public $alamat;
    public $tahun_angkatan;
    public $email;
    public $no_hp;

    public function mount($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if ($mahasiswa) {
            $this->mahasiswaId = $mahasiswa->id;
            $this->nama = $mahasiswa->nama;
            $this->nim = $mahasiswa->nim;
            $this->kelas = $mahasiswa->kelas;
            $this->tanggal_lahir = $mahasiswa->tanggal_lahir;
            $this->tempat_lahir = $mahasiswa->tempat_lahir;
            $this->alamat = $mahasiswa->alamat;
            $this->tahun_angkatan = $mahasiswa->tahun_angkatan;
            $this->email = $mahasiswa->email;
            $this->no_hp = $mahasiswa->no_hp;
        } elseif ($this->nim == null) {
            Alert::error('Woops!','Data yang kamu cari tidak ada!');
        }
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'nim' => 'required',
            'kelas' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'tahun_angkatan' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->mahasiswaId) {
            $mahasiswa = Mahasiswa::find($this->mahasiswaId);

            if ($mahasiswa) {
                $mahasiswa->update([
                    'nama' => $this->nama,
                    'nim' => $this->nim,
                    'kelas' => $this->kelas,
                    'tanggal_lahir' => $this->tanggal_lahir,
                    'tempat_lahir' => $this->tempat_lahir,
                    'alamat' => $this->alamat,
                    'tahun_angkatan' => $this->tahun_angkatan,
                    'email' => $this->email,
                    'no_hp' => $this->no_hp,
                ]);
            }
        }

        //flash message
        // session()->flash('message', 'Data Mahasiswa ' . $this->nama . ' Berhasil Diperbaharui!');
        Alert::success('BERHASIL!','Data Mahasiswa ' . $this->nama . ' Berhasil Diperbaharui!');
        // redirect
        return redirect()->route('mahasiswa.index');
    }

    public function render()
    {
        return view('livewire.mahasiswa.edit');
    }
}
