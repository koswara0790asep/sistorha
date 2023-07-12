<?php

namespace App\Http\Livewire\Dosen;

use App\Models\Dosen;
use App\Models\ProgramStudi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $nama;
    public $nik;
    public $nip;
    public $nidn;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $agama;
    public $no_hp;
    public $email;
    public $alamat;
    public $program_studi;
    public $status_aktif;
    public $jenis_kelamin;

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'nik' => 'required',
            // 'nip' => 'required',
            // 'nidn' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'program_studi' => 'required',
            'status_aktif' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        if (Dosen::where('nidn', $this->nidn)->exists()) {
            Alert::error('GAGAL!','Data Mahasiswa Sudah Ada!');
        } else {
            Dosen::create([
                'nama' => $this->nama,
                'nik' => $this->nik,
                'nip' => $this->nip,
                'nidn' => $this->nidn,
                'tempat_lahir' => $this->tempat_lahir,
                'tanggal_lahir' => $this->tanggal_lahir,
                'agama' => $this->agama,
                'no_hp' => $this->no_hp,
                'email' => $this->email,
                'alamat' => $this->alamat,
                'program_studi' => $this->program_studi,
                'status_aktif' => $this->status_aktif,
                'jenis_kelamin' => $this->jenis_kelamin,
            ]);
        }

        //flash message
        Alert::success('BERHASIL!','Data Dosen ' .$this->nama. ' Berhasil Disimpan!');

        // redirect
        return redirect()->route('dosen.index');
    }

    public function render()
    {
        $prodis = ProgramStudi::all();
        return view('livewire.dosen.create', compact('prodis'));
    }
}
