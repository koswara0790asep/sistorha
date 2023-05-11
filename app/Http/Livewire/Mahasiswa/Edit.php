<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{
    public $mahasiswaId;
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

    public function mount($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if ($mahasiswa) {
            $this->mahasiswaId = $mahasiswa->id;
            $this->nama = $mahasiswa->nama;
            $this->nik = $mahasiswa->nik;
            $this->nim = $mahasiswa->nim;
            $this->tempat_lahir = $mahasiswa->tempat_lahir;
            $this->tanggal_lahir = $mahasiswa->tanggal_lahir;
            $this->agama = $mahasiswa->agama;
            $this->no_hp = $mahasiswa->no_hp;
            $this->email = $mahasiswa->email;
            $this->alamat = $mahasiswa->alamat;
            $this->program_studi = $mahasiswa->program_studi;
            $this->periode = $mahasiswa->periode;
            $this->status_aktif = $mahasiswa->status_aktif;
            $this->jenis_kelamin = $mahasiswa->jenis_kelamin;
        } elseif ($this->nim == null) {
            Alert::error('Woops!','Data yang kamu cari tidak ada!');
        }
    }

    public function update()
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

        if ($this->mahasiswaId) {
            $mahasiswa = Mahasiswa::find($this->mahasiswaId);

            if ($mahasiswa) {
                $mahasiswa->update([
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
            }
        }

        //flash message
        Alert::success('BERHASIL!','Data Mahasiswa ' . $this->nama . ' Berhasil Diperbaharui!');

        // redirect
        return redirect()->route('mahasiswa.index');
    }

    public function render()
    {
        $prodis = ProgramStudi::all();
        return view('livewire.mahasiswa.edit', compact('prodis'));
    }
}
