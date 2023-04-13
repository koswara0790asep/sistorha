<?php

namespace App\Http\Livewire\Absen;

use App\Models\Absensi;
use App\Models\Absent;
use App\Models\DfKelas;
use App\Models\DfMatkul;
use Livewire\Component;
use Livewire\WithFileUploads;
use PhpOffice\PhpSpreadsheet\IOFactory;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $importFile;
    public $matkulSelect;
    public $kelasSelect;

    use WithFileUploads;

    public function render()
    {
        return view('livewire.absen.index', [
            // 'absensis' => Absensi::all(),
            'matkuls' => DfMatkul::all(),
            'kelases' => DfKelas::all(),
            'absensis' => $this->matkulSelect == null && $this->kelasSelect == null ?
            ''
            :
            Absensi::first()->where('kelas_id', 'like', '%' . $this->kelasSelect . '%')->where( 'matkul_id', 'like', '%' . $this->matkulSelect . '%')->get(),
        ]);
    }

    public function import()
    {
        $this->validate([
            'importFile' => 'required|mimes:xlsx'
        ]);

        // dd($this->importFile);
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
            // dd($row);
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
        // session()->flash('message', 'Data mahasiswa berhasil diimport.');
        Alert::success('BERHASIL!','Data absen berhasil diimport');

        return redirect()->route('absen.index');
    }
}
