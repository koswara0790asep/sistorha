<?php

namespace App\Http\Livewire\Dosen;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use PhpOffice\PhpSpreadsheet\IOFactory;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
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
    // user
    public $userId;
    public $name;
    public $username;
    public $emailUser;
    public $role;
    public $password;

    public $importDosen;

    use WithPagination, WithFileUploads;

    public function render()
    {
        return view('livewire.dosen.index', [
            'dosens' => Dosen::all(),
            // 'kelas' => Kelas::all(),
        ]);
    }

    public function destroy($dosenId)
    {
        $dosen = Dosen::find($dosenId);

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
        }

        $user = User::where('username', $this->nidn)->first();

        if ($user) {
            $user->delete();
            $dosen->delete();
        } else {
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
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Alert::success('BERHASIL!','Dosen '.$this->name.' berhasil dibuatkan akun!');
        }

        // redirect
        return redirect()->route('dosen.index');
    }

    public function importDsn()
    {
        // $this->validate([
        //     'importDosen' => 'required|mimes:xlsx'
        // ]);

        // dd($this->importDosen);
        $file = $this->importDosen;
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
            Dosen::firstOrCreate(
                [
                    'nidn' => $row[0],
                ],
                [
                    'nik' => $row[1],
                    'nip' => $row[2],
                    'nama' => $row[3],
                    'tanggal_lahir' => $row[5],
                    'tempat_lahir' => $row[4],
                    'agama' => $row[6],
                    'email' => $row[7],
                    'no_hp' => $row[8],
                    'alamat' => $row[9],
                    'program_studi' => $row[10],
                    'status_aktif' => $row[11],
                    'jenis_kelamin' => $row[12],
                ]
            );
        }

        // Reset form dan property
        $this->importDosen = null;
        // session()->flash('message', 'Data mahasiswa berhasil diimport.');
        Alert::success('BERHASIL!','Data dosen berhasil diimport');

        return redirect()->route('dosen.index');
    }


}
