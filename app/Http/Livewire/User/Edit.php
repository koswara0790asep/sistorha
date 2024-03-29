<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{

    public $userId;
    public $name;
    public $username;
    public $email;
    public $role;
    public $password;
    public $updated_at;

    public function mount($id)
    {
        $user = User::find($id);

        if ($user) {
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->username = $user->username;
            $this->email = $user->email;
            $this->role = $user->role;
            $this->password = $user->password;
            $this->updated_at = $user->updated_at;

        } elseif ($this->username == null) {
            Alert::warning('Woops!','Data yang Anda cari tidak ada!');
        }
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
        ]);

        if ($this->userId) {
            $user = User::find($this->userId);

            if ($user) {
                $user->update([
                    'name' => $this->name,
                    'username' => $this->username,
                    'email' => $this->email,
                    'role' => $this->role,
                    'password' => $this->password == $user->getOriginal('password') ? $user->getOriginal('password') : Hash::make($this->password),
                    'updated_at' => now(),
                ]);

                Alert::success('BERHASIL!','User '.$this->name.' berhasil diperbaharui!');
            }
        }

        return redirect()->route('user.index');
    }

    public function render()
    {

        return view('livewire.user.edit');
    }
}
