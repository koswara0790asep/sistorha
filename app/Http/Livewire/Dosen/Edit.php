<?php

namespace App\Http\Livewire\Dosen;

use App\Models\Dosen;
use App\Models\ProgramStudi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{

    public $dosenId;
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

    public function mount($id)
    {
        $dosen = Dosen::find($id);

        if ($dosen) {
            $this->dosenId = $dosen->id;
            $this->nama = $dosen->nama;
            $this->nik = $dosen->nik;
            $this->nip = $dosen->nip;
            $this->nidn = $dosen->nidn;
            $this->tempat_lahir = $dosen->tempat_lahir;
            $this->tanggal_lahir = $dosen->tanggal_lahir;
            $this->agama = $dosen->agama;
            $this->no_hp = $dosen->no_hp;
            $this->email = $dosen->email;
            $this->alamat = $dosen->alamat;
            $this->program_studi = $dosen->program_studi;
            $this->status_aktif = $dosen->status_aktif;
            $this->jenis_kelamin = $dosen->jenis_kelamin;
        } elseif ($this->nidn == null) {
            Alert::warning('Woops!','Data yang kamu cari tidak ada!');
        }
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'nik' => 'required',
            'nip' => 'required',
            'nidn' => 'required',
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

        if ($this->dosenId) {
            $dosen = Dosen::find($this->dosenId);

            if ($dosen) {
                $dosen->update([
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
        }

        //flash message
        Alert::success('BERHASIL!','Data Dosen ' . $this->nama . ' Berhasil Diperbaharui!');

        // redirect
        return redirect()->route('dosen.index');
    }

    public function render()
    {
        $prodis = ProgramStudi::all();
        return view('livewire.dosen.edit', compact('prodis'));
    }
}
