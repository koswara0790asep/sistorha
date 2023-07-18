<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Profil extends Component
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
        } elseif ($this->username != Auth::user()->username) {
            Alert::error('Woops!','Data yang Anda tuju bukan data Anda!');
        }
    }
    public function render()
    {
        return view('livewire.user.profil');
    }
}
