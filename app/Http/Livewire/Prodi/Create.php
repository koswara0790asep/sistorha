<?php

namespace App\Http\Livewire\Prodi;

use App\Models\Prodi;
use Livewire\Component;

class Create extends Component
{
    public $judul;
    public $nama_prodi;
    public $isi_berita;

    public function store()
    {
        $this->validate([
            'judul' => 'required',
            'nama_prodi' => 'required',
            'isi_berita' => 'required',
        ]);

        Prodi::create([
            'judul' => $this->judul,
            'nama_prodi' => $this->nama_prodi,
            'isi_berita' => $this->isi_berita,
        ]);

        //flash message
        session()->flash('message', 'Berita Berjudul: ' .$this->judul. ' Berhasil Diupload!');

        // redirect
        return redirect()->route('prodi.index');
    }

    public function render()
    {
        return view('livewire.prodi.create');
    }
}
