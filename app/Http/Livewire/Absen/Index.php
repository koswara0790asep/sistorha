<?php

namespace App\Http\Livewire\Absen;

use App\Models\Absensi;
use App\Models\Absent;
use App\Models\DfKelas;
use App\Models\DfMatkul;
use App\Models\ProgramStudi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use PhpOffice\PhpSpreadsheet\IOFactory;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $importFile;
    public $matkulSelect;
    public $kelasSelect;

    public $colors;

    use WithFileUploads;

    public function render()
    {
        $this->colors = [
            'success' => 'success',
            'danger' => 'danger',
            'warning' => 'warning',
            'info' => 'info',
            'primary' => 'primary',
            'secondary' => 'secondary',
        ];

        if (Auth::user()->role == 'prodi') {
            $dtProdi = ProgramStudi::where('kode', Auth::user()->username)->first();
            $matkuls = DfMatkul::where('program_studi', $dtProdi->id)->select('df_matkuls.*')->get();
            $kelases = DfKelas::where('prodi_id', $dtProdi->id)->get();

            return view('livewire.absen.index', [
                'matkuls' => $matkuls,
                'kelases' => $kelases,
                'absensis' => $this->matkulSelect == null || $this->kelasSelect == null ?
                ''
                :
                Absensi::first()->where('kelas_id', $this->kelasSelect)->where('matkul_id', $this->matkulSelect)->get(),
                'colors' => $this->colors,
            ]);
        } else {
            return view('livewire.absen.index', [
                'matkuls' => DfMatkul::all(),
                'kelases' => DfKelas::all(),
                'absensis' => $this->matkulSelect == null || $this->kelasSelect == null ?
                ''
                :
                Absensi::first()->where('kelas_id', $this->kelasSelect)->where('matkul_id', $this->matkulSelect)->get(),
                'colors' => $this->colors,
            ]);
        }
    }

    public function import()
    {
        $this->validate([
            'importFile' => 'required|mimes:xlsx'
        ]);

        $file = $this->importFile;
        $reader = IOFactory::createReader('Xlsx');
        if ($file->getClientOriginalExtension() !== 'xlsx') {
            Alert::error('Gagal!','Data yang diimport harus dalam bentuk .xlsx! Unduh contoh yang sudah ada.');
            return redirect()->route('absen.index');
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
            "matkul_id",
            "kelas_id",
            "semester",
            "nim",
        ];

        // dd($expectedHeader);
        if ($expectedHeader != $header) {
            Alert::error('Gagal!','Data yang diimport tidak sesuai! Unduh contoh yang sudah ada.');
            return redirect()->route('absen.index');
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
            Absensi::firstOrCreate(
                [
                    'nim' => $row[3],
                    'kelas_id' => $row[1],
                    'matkul_id' => $row[0],
                    'semester' => $row[2],
                ],
            );
        }

        // Reset form dan property
        $this->importFile = null;

        Alert::success('BERHASIL!','Data absen berhasil diimport');

        return redirect()->route('absen.index');
    }
}
