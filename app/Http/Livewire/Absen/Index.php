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

    // public $prodiId;

    use WithFileUploads;

    public function render()
    {
        if (Auth::user()->role == 'prodi') {
            $dtProdi = ProgramStudi::where('kode', Auth::user()->username)->first();
            $matkuls = DfMatkul::where('program_studi', $dtProdi->id)->select('df_matkuls.*')->get();
            $kelases = DfKelas::where('prodi_id', $dtProdi->id)->get();
            // dd($matkuls);
            return view('livewire.absen.index', [
                'matkuls' => $matkuls,
                'kelases' => $kelases,
                'absensis' => $this->matkulSelect == null || $this->kelasSelect == null ?
                ''
                :
                Absensi::first()->where('kelas_id', 'like', '%' . $this->kelasSelect . '%')->where('matkul_id', 'like', '%' . $this->matkulSelect . '%')->get(),
            ]);
        } else {
            return view('livewire.absen.index', [
                'matkuls' => DfMatkul::all(),
                'kelases' => DfKelas::all(),
                'absensis' => $this->matkulSelect == null || $this->kelasSelect == null ?
                ''
                :
                Absensi::first()->where('kelas_id', 'like', '%' . $this->kelasSelect . '%')->where('matkul_id', 'like', '%' . $this->matkulSelect . '%')->get(),
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
