<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\Mahasiswa;
use App\Models\User;
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
    public $nim;
    public $kelas;
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

    public $importFile;

    use WithPagination, WithFileUploads;

    public function render()
    {
        return view('livewire.mahasiswa.index', [
            'mahasiswas' => Mahasiswa::all(),
        ]);
    }

    public function destroy($mahasiswaId)
    {
        $mahasiswa = Mahasiswa::find($mahasiswaId);
        if ($mahasiswa) {
            $this->mahasiswaId = $mahasiswa->id;
            $this->nama = $mahasiswa->nama;
            $this->nim = $mahasiswa->nim;
            $this->kelas = $mahasiswa->kelas;
            $this->tanggal_lahir = $mahasiswa->tanggal_lahir;
            $this->tempat_lahir = $mahasiswa->tempat_lahir;
            $this->alamat = $mahasiswa->alamat;
            $this->tahun_angkatan = $mahasiswa->tahun_angkatan;
            $this->email = $mahasiswa->email;
            $this->no_hp = $mahasiswa->no_hp;
        }

        $mahasiswa->delete();

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
            $this->nim = $mahasiswa->nim;
            $this->kelas = $mahasiswa->kelas;
            $this->tanggal_lahir = $mahasiswa->tanggal_lahir;
            $this->tempat_lahir = $mahasiswa->tempat_lahir;
            $this->alamat = $mahasiswa->alamat;
            $this->tahun_angkatan = $mahasiswa->tahun_angkatan;
            $this->email = $mahasiswa->email;
            $this->no_hp = $mahasiswa->no_hp;
        }

        $user = User::where('username', $this->nim)->first();
        if ($user) {
            Alert::warning('GAGAL!','Data user sudah ada!');
        } else {
            User::create([
                'name' => $this->nama,
                'username' => $this->nim,
                'email' => $this->email,
                'role' => 'mahasiswa',
                'password' => Hash::make($this->nim),
            ]);

            Alert::success('BERHASIL!','Mahasiswa '.$this->name.' berhasil dibuatkan akun!');
        }

        // redirect
        return redirect()->route('mahasiswa.index');
    }

    public function import()
    {
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
            Mahasiswa::create([
                'nama' => $row[0],
                'nim' => $row[1],
                'kelas' => $row[2],
                'tanggal_lahir' => $row[3],
                'tempat_lahir' => $row[4],
                'alamat' => $row[5],
                'tahun_angkatan' => $row[6],
                'email' => $row[7],
                'no_hp' => $row[8],
            ]);
        }
        // foreach ($rows as $row) {
        //     $mahasiswa = new Mahasiswa;
        //     $mahasiswa->nama = $row[0];
        //     $mahasiswa->nim = $row[1];
        //     $mahasiswa->kelas = $row[2];
        //     $mahasiswa->tanggal_lahir = $row[3];
        //     $mahasiswa->tempat_lahir = $row[4];
        //     $mahasiswa->alamat = $row[5];
        //     $mahasiswa->tahun_angkatan = $row[6];
        //     $mahasiswa->email = $row[7];
        //     $mahasiswa->no_hp = $row[8];
            // dd($mahasiswa);
            // Mahasiswa::create($mahasiswa);
            // $mahasiswa->save();
            // $mahasiswa = new Mahasiswa;
            // $mahasiswa->nama = $row['nama'];
            // $mahasiswa->nim = $row['nim'];
            // $mahasiswa->kelas = $row['kelas'];
            // $mahasiswa->tanggal_lahir = $row['tanggal_lahir'];
            // $mahasiswa->tempat_lahir = $row['tempat_lahir'];
            // $mahasiswa->alamat = $row['alamat'];
            // $mahasiswa->tahun_angkatan = $row['tahun_angkatan'];
            // $mahasiswa->email = $row['email'];
            // $mahasiswa->no_hp = $row['no_hp'];
            // $mahasiswa->save();
        // }
        // dd($rowData);

        // Reset form dan property
        $this->importFile = null;
        // session()->flash('message', 'Data mahasiswa berhasil diimport.');
        Alert::success('BERHASIL!','Data mahasiswa berhasil diimport');

        return redirect()->route('mahasiswa.index');
    }

}
