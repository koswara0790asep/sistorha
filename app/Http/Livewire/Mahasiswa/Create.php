<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $nama;
    public $nik;
    public $nim;
    public $tanggal_lahir;
    public $tempat_lahir;
    public $agama;
    public $no_hp;
    public $email;
    public $alamat;
    public $program_studi;
    public $periode;
    public $status_aktif;
    public $jenis_kelamin;

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'nik' => 'required',
            'nim' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'program_studi' => 'required',
            'periode' => 'required',
            'status_aktif' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        if (Mahasiswa::where('nim', $this->nim)->exists()) {
            Alert::warning('GAGAL!','Data Mahasiswa Sudah Ada!');
        } else {

            Mahasiswa::create([
                'nama' => $this->nama,
                'nik' => $this->nik,
                'nim' => $this->nim,
                'tanggal_lahir' => $this->tanggal_lahir,
                'tempat_lahir' => $this->tempat_lahir,
                'agama' => $this->agama,
                'email' => $this->email,
                'no_hp' => $this->no_hp,
                'alamat' => $this->alamat,
                'program_studi' => $this->program_studi,
                'periode' => $this->periode,
                'status_aktif' => $this->status_aktif,
                'jenis_kelamin' => $this->jenis_kelamin,
            ]);

            Alert::success('BERHASIL!','Data Mahasiswa ' .$this->nama. ' Berhasil Disimpan!');
        }

        // redirect
        return redirect()->route('mahasiswa.index');
    }

    public function render()
    {
        $prodis = ProgramStudi::all();
        return view('livewire.mahasiswa.create', compact('prodis'));
    }
}
