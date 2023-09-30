<?php

namespace App\Http\Livewire\Jadwal;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\KelasMhsw;
use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use PhpOffice\PhpSpreadsheet\IOFactory;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $jadwalId;
    public $dosenNIK;
    public $dosenId;

    public $mhsNIM;
    public $mhsId;
    public $klsMhsId;
    public $klsId;

    public $prodiKODE;
    public $prodiId;

    public $prodi_id;
    public $kelas_id;
    public $semester;
    public $matkul_id;
    public $sks;
    public $jml_jam;
    public $dosen_id;
    public $hari;
    public $jam_awal;
    public $jam_akhir;
    public $ruang_id;

    public $currentSmst = 'genap';

    public $importJadwal;

    use WithFileUploads;

    public function mount(Dosen $dosen, KelasMhsw $kelasMhsw)
    {
        if (Auth::user()->role == 'dosen') {
            $this->dosenNIK = $dosen->nik;
            $dosen = Dosen::where('nik', $this->dosenNIK)->first();
            if ($dosen) {
                $this->dosenId = $dosen->id;
            }
        } elseif (Auth::user()->role == 'mahasiswa') {
            $this->mhsNIM = Auth::user()->username;
            $mahasiswa = Mahasiswa::where('nim', $this->mhsNIM)->select('mahasiswas.*', 'id')->first();
            $this->mhsId = $mahasiswa->id;
            $kelasMhsw = KelasMhsw::where('mahasiswa_id', $this->mhsId)->select('kelas_mhsws.*', 'kelas_id')->orderBy('created_at', 'desc')->first();
            if ($kelasMhsw) {
                $this->klsId = $kelasMhsw->kelas_id;
            }
        } elseif (Auth::user()->role == 'prodi') {
            $this->prodiKODE = Auth::user()->username;
            $prodi = ProgramStudi::where('kode', $this->prodiKODE)->select('program_studies.*', 'id')->first();
            if ($prodi) {
                $this->prodiId = $prodi->id;
            }
        }
    }

    public function render()
    {
        if (Auth::user()->role == 'mahasiswa') {
            return view('livewire.jadwal.index', [
                'jadwals' => $this->klsId == null ?
                Jadwal::all() :
                Jadwal::first()->where('kelas_id', $this->klsId)->get(),
                'currentSmst' => $this->currentSmst,
            ]);
        } elseif (Auth::user()->role == 'prodi') {
            return view('livewire.jadwal.index', [
                'jadwals' => $this->prodiId == null ?
                Jadwal::all() :
                Jadwal::first()->where('prodi_id', $this->prodiId)->where('thn_ajar', date('Y'))->get(),
                'currentSmst' => $this->currentSmst,
            ]);
        } else {
            return view('livewire.jadwal.index', [
                'jadwals' => $this->dosenId == null ?
                Jadwal::all() :
                Jadwal::first()->where('dosen_id', $this->dosenId)->where('thn_ajar', date('Y'))->get(),
                'currentSmst' => $this->currentSmst,
            ]);
        }
    }

    public function destroy($jadwalId)
    {
        $jadwal = Jadwal::find($jadwalId);

        if ($jadwal) {
            $jadwal->delete();
        }

        Alert::success('BERHASIL','Data Jadwal terpilih berhasil dihapus!');

        // redirect
        return redirect()->route('jadwal.index');
    }


    public function importJadw()
    {
        $this->validate([
            'importJadwal' => 'required|mimes:xlsx'
        ]);

        $file = $this->importJadwal;
        $reader = IOFactory::createReader('Xlsx');
        if ($file->getClientOriginalExtension() !== 'xlsx') {
            Alert::error('Gagal!','Data yang diimport harus dalam bentuk .xlsx! Unduh contoh yang sudah ada.');
            return redirect()->route('jadwal.index');
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
            "prodi_id",
            "kelas_id",
            "matkul_id",
            "dosen_id",
            "ruang_id",
            "semester",
            "sks",
            "jml_jam",
            "hr",
            "jam_awal",
            "jam_akhir",
        ];

        // dd($expectedHeader);
        if ($expectedHeader != $header) {
            Alert::error('Gagal!','Data yang diimport tidak sesuai! Unduh contoh yang sudah ada.');
            return redirect()->route('jadwal.index');
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
            if ($row[8] == 1) {
                $hari = 'Senin';
            } elseif ($row[8] == 2) {
                $hari = 'Selasa';
            } elseif ($row[8] == 3) {
                $hari = 'Rabu';
            } elseif ($row[8] == 4) {
                $hari = 'Kamis';
            } elseif ($row[8] == 5) {
                $hari = "Jum'at";
            } elseif ($row[8] == 6) {
                $hari = 'Sabtu';
            } elseif ($row[8] == 7) {
                $hari = 'Minggu/Ahad';
            }

            $jam_awal = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9]))->format('H:i:s');
            $jam_akhir = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]))->format('H:i:s');

            Jadwal::firstOrCreate(
                [
                    'prodi_id' => $row[0],
                    'kelas_id' => $row[1],
                    'matkul_id' => $row[2],
                    'dosen_id' => $row[3],
                    'ruang_id' => $row[4],
                    'semester' => $row[5],
                    'sks' => $row[6],
                    'jml_jam' => $row[7],
                    'hr' => $row[8],
                    'hari' => $hari,
                    'jam_awal' => $jam_awal,
                    'jam_akhir' => $jam_akhir,
                ]
            );
        }

        // Reset form dan property
        $this->importJadwal = null;

        Alert::success('BERHASIL!','Data jadwal berhasil diimport');

        return redirect()->route('jadwal.index');
    }

}
