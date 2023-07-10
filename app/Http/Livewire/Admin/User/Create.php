<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    public $name;
    public $username;
    public $role;
    public $email;
    public $password;

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $dataExists = User::where('username', $this->username)
                            ->where('email', $this->email)
                            ->exists();
        if (!$dataExists) {
            User::create([
                'name' => $this->name,
                'username' => $this->username,
                'role' => $this->role,
                'email' => $this->email,
                'password' => $this->password,
            ]);
            //flash message
            Alert::success('Tambah Data User','User berhasil ditambahkan!');
            // session()->flash('message', 'Data User ' .$this->nama. ' Berhasil Disimpan!');

            // redirect
            return redirect()->route('/users');
        } else {
            Alert::error('Gagal','User tidak berhasil ditambahkan!');
        }

    }

    public function render()
    {
        return view('livewire.admin.user.create');
    }
}
