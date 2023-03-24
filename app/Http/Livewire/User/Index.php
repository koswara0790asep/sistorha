<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class Index extends Component
{
    public $userId;
    public $name;
    public $username;
    public $email;
    public $role;
    public $password;

    public function render()
    {
        return view('livewire.user.index', [
            'users' => User::latest()->get(),
            'date'  => Carbon::now(),
        ]);
    }

    public function destroy($userId)
    {
        $user = User::find($userId);

        if($userId){
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->username = $user->username;
            $this->email = $user->email;
            $this->role = $user->role;
            $this->password = $user->password;
        }

        $user->delete();

        Alert::success('Berhasil!','Data user berhasil dihapus');

        return redirect('/users');
    }
}
