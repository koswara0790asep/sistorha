<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $name;
    public $username;
    public $email;
    public $role;
    public $password;

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
        ]);


        if (User::where('username', $this->username)->exists()) {

            Alert::warning('GAGAL!','Data User Sudah Ada!');
        } else {
            User::create([
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'role' => $this->role,
                'password' => Hash::make($this->password),
            ]);
            Alert::success('BERHASIL','User '.$this->name.' Berhasil Disimpan!');

        }
        // redirect
        return redirect()->route('user.index');
    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
