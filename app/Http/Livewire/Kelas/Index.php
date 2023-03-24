<?php

namespace App\Http\Livewire\Kelas;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\callback;

class Index extends Component
{
    public $kelasId;
    public $nama_kelas;
    public $dosen_wali;
    public $ketua_kelas;
    public $search;

    protected $listeners = ['hapus'];

    use WithPagination;

    public function render()
    {
        return view('livewire.kelas.index', [
            'kelas' => $this->search === null ?
            Kelas::first()->get() :
            Kelas::first()->where('nama_kelas', 'like', '%' . $this->search . '%')->get(),
            'mahasiswa' => Mahasiswa::all()
        ]);
    }

    public function deleteData($id)
    {

        $this->confirm('Yakin ingin menghapus data?', [
            'toast' => false,
            'position' => 'top-end',
            'text' => 'Data akan dihapus secara permanen!',
            'showCancelButton' => true,
            'showConfirmButton' => true,
            'confirmButtonText' => 'Ya, hapus data!',
            'cancelButtonText' => 'Batal',
            'onConfirmed' => 'deleteConfirmed',
            'onCancelled' => 'deleteCancelled',
            'id' => $id,
        ]);
    }

    public function deleteConfirmed()
    {
        // Code untuk menghapus data
        $this->alert('success', 'Data berhasil dihapus!');
    }

    public function deleteCancelled()
    {
        // Tidak melakukan apa-apa
    }

    public function destroy($kelasId)
    {
        $kelas = Kelas::find($kelasId);

        if ($kelas) {
            $this->kelasId = $kelas->id;
            $this->nama_kelas = $kelas->nama_kelas;
            $this->dosen_wali = $kelas->dosen_wali;
            $this->ketua_kelas = $kelas->ketua_kelas;
        }


        $kelas->delete();
        // dd($kelas);
        // ->customClass([
        //     // "confirmButton" => dd("confirm"),
        //     // "cancelButton" => dd("cancel"),
        // ]);
        Alert::success('BERHASIL','Ada! ditemukan');

        // redirect
        return redirect()->route('kelas.index');
    }
}
