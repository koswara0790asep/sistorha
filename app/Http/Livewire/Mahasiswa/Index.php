<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use PhpOffice\PhpSpreadsheet\IOFactory;
use RealRashid\SweetAlert\Facades\Alert;
use Sortable;

class Index extends Component
{
    // mahasiswa
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
    // user
    public $userId;
    public $name;
    public $username;
    public $emailUser;
    public $role;
    public $password;

    public $importFile;

    public $prodiId;

    use WithPagination, WithFileUploads;

    public function render()
    {
        $prodi = ProgramStudi::where('kode', Auth::user()->username)->first();
        $this->prodiId = $prodi->id ?? null;

        return view('livewire.mahasiswa.index', [
            'mahasiswas' => $this->prodiId == null ? Mahasiswa::all() : Mahasiswa::where('program_studi', $this->prodiId)->get(),
        ]);
    }

    public function destroy($mahasiswaId)
    {
        $mahasiswa = Mahasiswa::find($mahasiswaId);
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
        }

        $user = User::where('username', $this->nim)->first();

        if ($user) {
            $user->delete();
            $mahasiswa->delete();
        } else {
            $mahasiswa->delete();
        }

        //flash message
        Alert::success('Berhasil!','Data mahasiswa berhasil terhapus!');

        // redirect
        return redirect()->route('mahasiswa.index');
    }

    public function genAkun($mahasiswaId)
    {
        $mahasiswa = Mahasiswa::find($mahasiswaId);

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
        }

        $user = User::where('username', $this->nim)->first();
        if ($user) {
            Alert::error('GAGAL!','Data user sudah ada!');
        } else {
            User::create([
                'name' => $this->nama,
                'username' => $this->nim,
                'email' => $this->email,
                'role' => 'mahasiswa',
                'password' => Hash::make($this->nim),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Alert::success('BERHASIL!','Mahasiswa '.$this->name.' berhasil dibuatkan akun!');
        }

        // redirect
        return redirect()->route('mahasiswa.index');
    }

    public function import()
    {
        $this->validate([
            'importFile' => 'required|mimes:xlsx'
        ]);

        $file = $this->importFile;
        $reader = IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($file->getRealPath());
        $worksheet = $spreadsheet->getActiveSheet();


        $rows = [];
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            $rowData = [];
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }
            $rows[] = $rowData;
        }

        // Simpan data ke database
        foreach ($rows as $row){
            Mahasiswa::firstOrCreate(
                [
                    'nim' => $row[0],
                ],
                [
                    'nik' => $row[1],
                    'nama' => $row[2],
                    'tanggal_lahir' => $row[4],
                    'tempat_lahir' => $row[3],
                    'agama' => $row[5],
                    'email' => $row[6],
                    'no_hp' => $row[7],
                    'alamat' => $row[8],
                    'program_studi' => $row[9],
                    'periode' => $row[10],
                    'status_aktif' => $row[11],
                    'jenis_kelamin' => $row[12],
                ]
            );
        }

        // Reset form dan property
        $this->importFile = null;

        Alert::success('BERHASIL!','Data mahasiswa berhasil diimport');

        return redirect()->route('mahasiswa.index');
    }

}
