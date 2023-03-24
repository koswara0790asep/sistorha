<?php

namespace App\Http\Livewire\Prodi;

use App\Models\Prodi;
use Livewire\Component;

class Edit extends Component
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

    public function update()
    {
        $this->validate([
            'judul' => 'required',
            'nama_prodi' => 'required',
            'isi_berita' => 'required',
        ]);

        if ($this->prodiId) {
            $prodi = Prodi::find($this->prodiId);

            if ($prodi) {
                $prodi->update([
                    'judul' => $this->judul,
                    'nama_prodi' => $this->nama_prodi,
                    'isi_berita' => $this->isi_berita,
                ]);
            }
        }

        //flash message
        session()->flash('message', 'Berita Berjudul: ' . $this->judul . ' Berhasil Diperbaharui!');

        // redirect
        return redirect()->route('prodi.index');
    }

    public function render()
    {
        return view('livewire.prodi.edit');
    }
}
