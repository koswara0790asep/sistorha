<?php

namespace App\Http\Livewire\Dosen;

use App\Models\Dosen;
use App\Models\Kelas;
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

    public $prodiId;

    use WithPagination, WithFileUploads;

    public function render()
    {
        $prodi = ProgramStudi::where('kode', Auth::user()->username)->first();
        $this->prodiId = $prodi->id ?? null;

        return view('livewire.dosen.index', [
            'dosens' => $this->prodiId == null ? Dosen::all() : Dosen::where('program_studi', $this->prodiId)->get(),
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
        if ($this->nidn == null || $this->nidn == '') {
            $user = User::where('username', $this->nik)->first();

            if ($user) {
                Alert::error('GAGAL!','Data user sudah ada!');
            } else {
                User::create([
                    'name' => $this->nama,
                    'username' => $this->nik,
                    'email' => $this->email,
                    'role' => 'dosen',
                    'password' => Hash::make('12345678'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                Alert::success('BERHASIL!','Dosen '.$this->name.' berhasil dibuatkan akun!');
            }
        } else {
            $user = User::where('username', $this->nidn)->first();

            if ($user) {
                Alert::error('GAGAL!','Data user sudah ada!');
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
        }


        // redirect
        return redirect()->route('dosen.index');
    }

    public function importDsn()
    {
        // $this->validate([
        //     'importDosen' => 'required|mimes:xlsx'
        // ]);

        $file = $this->importDosen;
        $reader = IOFactory::createReader('Xlsx');
        if ($file->getClientOriginalExtension() !== 'xlsx') {
            Alert::error('Gagal!','Data yang diimport harus dalam bentuk .xlsx! Unduh contoh yang sudah ada.');
            return redirect()->route('dosen.index');
        }
        $spreadsheet = $reader->load($file->getRealPath());
        $worksheet = $spreadsheet->getActiveSheet();

        $headerRow = $worksheet->getRowIterator(1)->current();

        // Mendapatkan sel-sel pada baris pertama
        $cellIterator = $headerRow->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(true);

        // Array untuk menyimpan header
        $header = [];

        // Mengiterasi setiap sel pada baris pertama
        foreach ($cellIterator as $cell) {
            $header[] = $cell->getValue();
        }

        $expectedHeader = [
            "nidn",
            "nik",
            "nip",
            "nama",
            "tp_l",
            "tg_l",
            "agama",
            "email",
            "no_hp",
            "alamat",
            "pd_id",
            "status",
            "gender"
        ];

        // dd($expectedHeader);
        if ($expectedHeader != $header) {
            Alert::error('Gagal!','Data yang diimport tidak sesuai! Unduh contoh yang sudah ada.');
            return redirect()->route('dosen.index');
        }

        // Mendapatkan iterator untuk baris-baris berikutnya (mulai dari baris kedua)
        $dataRows = $worksheet->getRowIterator(2);

        // Array untuk menyimpan data yang akan diimpor
        $data = [];

        // Mengiterasi setiap baris mulai dari baris kedua
        foreach ($dataRows as $row) {
            // Mendapatkan sel-sel pada baris saat ini
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(true);

            // Array untuk menyimpan data pada baris saat ini
            $rowData = [];

            // Mengiterasi setiap sel pada baris saat ini
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }

            // Menambahkan data pada baris saat ini ke dalam array data
            $data[] = $rowData;
        }

        // Simpan data ke database
        foreach ($data as $row){
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

        Alert::success('BERHASIL!','Data dosen berhasil diimport');

        return redirect()->route('dosen.index');
    }


}
