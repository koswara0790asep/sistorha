<?php

namespace App\Http\Livewire\Dosen;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
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
    // user
    public $userId;
    public $name;
    public $username;
    public $emailUser;
    public $role;
    public $password;

    public $search;
    use WithPagination;

    public function render()
    {
        return view('livewire.dosen.index', [
            'dosens' => $this->search === null ?
            Dosen::first()->get() :
            Dosen::first()->where('nama', 'like', '%' . $this->search . '%')->get(),
            'kelas' => Kelas::all(),
        ]);
    }

    public function destroy($dosenId)
    {
        $dosen = Dosen::find($dosenId);

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
        }

        if ($dosen) {
            $dosen->delete();
        }
        //flash message
        // session()->flash('message', 'Data Dosen '.$this->nama.' Berhasil Dihapus!');
        Alert::success('Berhasil!','Data dosen berhasil terhapus!');

        // redirect
        return redirect()->route('dosen.index');
    }

    public function genAkun($dosenId)
    {
        $dosen = dosen::find($dosenId);

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
        }

        // dd($dosen);

        $user = User::where('username', $this->nidn)->first();
        if ($user) {
            Alert::warning('GAGAL!','Data user sudah ada!');
        } else {
            User::create([
                'name' => $this->nama,
                'username' => $this->nidn,
                'email' => $this->email,
                'role' => 'dosen',
                'password' => Hash::make($this->nidn),
            ]);

            Alert::success('BERHASIL!','Dosen '.$this->name.' berhasil dibuatkan akun!');
        }

        // redirect
        return redirect()->route('dosen.index');
    }
}
