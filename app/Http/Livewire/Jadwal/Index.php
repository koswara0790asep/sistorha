<?php

namespace App\Http\Livewire\Jadwal;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\KelasMhsw;
use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
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

    public $importJadwal;

    use WithFileUploads;

    public function mount(Dosen $dosen, KelasMhsw $kelasMhsw)
    {
        if (Auth::user()->role == 'dosen') {
            $this->dosenNIDN = $dosen->nidn;
            $dosen = Dosen::where('nidn', $this->dosenNIDN)->first();
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
                Jadwal::first()->where('kelas_id', 'like', '%' . $this->klsId . '%')->get(),
            ]);
        } elseif (Auth::user()->role == 'prodi') {
            return view('livewire.jadwal.index', [
                'jadwals' => $this->prodiId == null ?
                Jadwal::all() :
                Jadwal::first()->where('prodi_id', 'like', '%' . $this->prodiId . '%')->get(),
            ]);
        } else {
            return view('livewire.jadwal.index', [
                'jadwals' => $this->dosenId == null ?
                Jadwal::all() :
                Jadwal::first()->where('dosen_id', 'like', '%' . $this->dosenId . '%')->get(),
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
            if ($row[8] == 1) {
                $hari = 'Senin';
            } elseif ($row[8] == 2) {
                $hari = 'Selasa';
            } elseif ($row[8] == 3) {
                $hari = 'Rabu';
            } elseif ($row[8] == 4) {
                $hari = 'Kamis';
            } elseif ($row[8] == 5) {
                $hari = 'Jum.at';
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
