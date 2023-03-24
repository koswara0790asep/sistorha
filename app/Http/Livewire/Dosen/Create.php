<?php

namespace App\Http\Livewire\Dosen;

use App\Models\Dosen;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $nama;
    public $nidn;
    public $jabatan;
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
            'nidn' => 'required',
            'jabatan' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'tahun_angkatan' => 'required',
            'email' => 'required|email',
        ]);

        Dosen::create([
            'nama' => $this->nama,
            'nidn' => $this->nidn,
            'jabatan' => $this->jabatan,
            'tanggal_lahir' => $this->tanggal_lahir,
            'tempat_lahir' => $this->tempat_lahir,
            'alamat' => $this->alamat,
            'tahun_angkatan' => $this->tahun_angkatan,
            'email' => $this->email,
            'no_hp' => $this->no_hp,
        ]);

        //flash message
        // session()->flash('message', 'Data Dosen ' .$this->nama. ' Berhasil Disimpan!');
        Alert::success('BERHASIL!','Data Dosen ' .$this->nama. ' Berhasil Disimpan!');

        // redirect
        return redirect()->route('dosen.index');
    }

    public function render()
    {
        return view('livewire.dosen.create');
    }
}
