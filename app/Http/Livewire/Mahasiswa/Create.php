<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\Mahasiswa;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $nama;
    public $nim;
    public $kelas;
    public $tanggal_lahir;
    public $tempat_lahir;
    public $alamat;
    public $tahun_angkatan;
    public $email;
    public $no_hp;

    public function store()
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

        if (Mahasiswa::where('nim', $this->nim)->exists()) {
            Alert::warning('GAGAL!','Data Mahasiswa Sudah Ada!');
        } else {

            Mahasiswa::create([
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

            Alert::success('BERHASIL!','Data Mahasiswa ' .$this->nama. ' Berhasil Disimpan!');
        }

        // redirect
        return redirect()->route('mahasiswa.index');
    }

    public function render()
    {
        return view('livewire.mahasiswa.create');
    }
}
