<?php

namespace App\Http\Livewire\Programstudi;

use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $prodiId;
    public $program_studi;
    public $kode;
    public $status;

    public function render()
    {
        return view('livewire.programstudi.index', [
            'prodies' => ProgramStudi::all(),
        ]);
    }

    public function destroy($prodiId)
    {
        $prodi = ProgramStudi::find($prodiId);

        if ($prodi) {
            $this->prodiId = $prodi->id;
            $this->program_studi = $prodi->program_studi;
            $this->kode = $prodi->kode;
            $this->status = $prodi->status;
        }


        $user = User::where('username', $this->kode)->first();

        if ($user) {
            $user->delete();
            $prodi->delete();
        } else {
            $prodi->delete();
        }

        Alert::success('BERHASIL!','Data Program Studinya Berhasil Dihapus!');

        return redirect()->route('programstudi.index');
    }

    public function genAkun($prodiId)
    {
        $prodi = ProgramStudi::find($prodiId);

        if ($prodi) {
            $this->prodiId = $prodi->id;
            $this->program_studi = $prodi->program_studi;
            $this->kode = $prodi->kode;
            $this->status = $prodi->status;
        }

        $user = User::where('username', $this->kode)->first();
        if ($user) {
            Alert::warning('GAGAL!','Data user sudah ada!');
        } else {
            User::create([
                'name' => $this->program_studi,
                'username' => $this->kode,
                'email' => strtolower($this->kode). '@poltektedc.ac.id',
                'role' => 'prodi',
                'password' => Hash::make($this->kode),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Alert::success('BERHASIL!','Program Studi '.$this->program_studi.' berhasil dibuatkan akun!');
        }

        // redirect
        return redirect()->route('programstudi.index');
    }

}
