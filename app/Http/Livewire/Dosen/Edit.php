<?php

namespace App\Http\Livewire\Dosen;

use App\Models\Dosen;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{

    public $dosenId;
    public $nama;
    public $nidn;
    public $jabatan;
    public $tanggal_lahir;
    public $tempat_lahir;
    public $alamat;
    public $tahun_angkatan;
    public $email;
    public $no_hp;

    public function mount($id)
    {
        $dosen = Dosen::find($id);

        if ($dosen) {
            $this->dosenId = $dosen->id;
            $this->nama = $dosen->nama;
            $this->nidn = $dosen->nidn;
            $this->jabatan = $dosen->jabatan;
            $this->tanggal_lahir = $dosen->tanggal_lahir;
            $this->tempat_lahir = $dosen->tempat_lahir;
            $this->alamat = $dosen->alamat;
            $this->tahun_angkatan = $dosen->tahun_angkatan;
            $this->email = $dosen->email;
            $this->no_hp = $dosen->no_hp;
        } elseif ($this->nidn == null) {
            Alert::error('Woops!','Data yang kamu cari tidak ada!');
        }
    }

    public function update()
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

        if ($this->dosenId) {
            $dosen = Dosen::find($this->dosenId);

            if ($dosen) {
                $dosen->update([
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
            }
        }

        //flash message
        // session()->flash('message', 'Data Dosen ' . $this->nama . ' Berhasil Diperbaharui!');
        Alert::success('BERHASIL!','Data Mahasiswa ' . $this->nama . ' Berhasil Diperbaharui!');
        // redirect
        return redirect()->route('dosen.index');
    }

    public function render()
    {
        return view('livewire.dosen.edit');
    }
}
