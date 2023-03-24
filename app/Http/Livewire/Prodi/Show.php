<?php

namespace App\Http\Livewire\Prodi;

use App\Models\Prodi;
use Livewire\Component;

class Show extends Component
{
    public $prodiId;
    public $judul;
    public $nama_prodi;
    public $isi_berita;

    public function mount($id)
    {
        $prodi = Prodi::find($id);

        if ($prodi) {
            $this->prodiId = $prodi->id;
            $this->judul = $prodi->judul;
            $this->nama_prodi = $prodi->nama_prodi;
            $this->isi_berita = $prodi->isi_berita;
        }
    }

    public function render()
    {
        return view('livewire.prodi.show');
    }

    public function destroy($prodiId)
    {
        $prodi = Prodi::find($prodiId);

        if ($prodi) {
            $prodi->delete();
        }
        
        //flash message
        session()->flash('message', 'Pemberitahuan Berjudul: '.$this->judul.' Berhasil Dihapus!');

        // redirect
        return redirect()->route('prodi.index');
    }
}
