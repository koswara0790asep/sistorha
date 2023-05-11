<?php

namespace App\Http\Livewire\Jadwal;

use App\Models\Dosen;
use App\Models\Jadwal;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Time;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\TimeValue;
use PhpOffice\PhpSpreadsheet\IOFactory;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $jadwalId;
    public $dosenNIDN;
    public $dosenId;

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

    public $importJadwal;

    use WithFileUploads;

    public function mount(Dosen $dosen)
    {
        $this->dosenNIDN = $dosen->nidn;
        $dosen = Dosen::where('nidn', $this->dosenNIDN)->first();
        if ($dosen) {
            $this->dosenId = $dosen->id;
        }
    }

    public function render()
    {
        return view('livewire.jadwal.index', [
            'jadwals' => $this->dosenId == null ?
            Jadwal::all() :
            Jadwal::first()->where('dosen_id', 'like', '%' . $this->dosenId . '%')->get(),
        ]);
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
            if ($row[7] == 1) {
                $hari = 'Senin';
            } elseif ($row[7] == 2) {
                $hari = 'Selasa';
            } elseif ($row[7] == 3) {
                $hari = 'Rabu';
            } elseif ($row[7] == 4) {
                $hari = 'Kamis';
            } elseif ($row[7] == 5) {
                $hari = 'Jum.at';
            } elseif ($row[7] == 6) {
                $hari = 'Sabtu';
            } elseif ($row[7] == 7) {
                $hari = 'Minggu/Ahad';
            }

            $jam_awal = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8]))->format('H:i:s');
            $jam_akhir = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9]))->format('H:i:s');

            Jadwal::firstOrCreate(
                [
                    'kelas_id' => $row[0],
                    'matkul_id' => $row[1],
                    'dosen_id' => $row[2],
                    'ruang_id' => $row[3],
                    'semester' => $row[4],
                    'sks' => $row[5],
                    'jml_jam' => $row[6],
                    'hr' => $row[7],
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
