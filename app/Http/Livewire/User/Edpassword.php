<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Edpassword extends Component
{
    public $userId;
    public $oldpassword;
    public $newpassword;
    public $confirmpassword;
    public $updated_at;

    public function mount($id)
    {
        $user = User::find($id);

        if ($user) {
            $this->userId = $user->id;
        } elseif ($this->userId != Auth::user()->id) {
            Alert::error('Woops!','Data yang Anda cari tidak ada!');
        }
    }

    public function updatePass()
    {
        $this->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required',
        ]);

        if ($this->userId) {
            $user = User::find($this->userId);

            if ($this->newpassword == $this->confirmpassword) {

                if (Hash::check($this->oldpassword, Auth::user()->password)) {

                    if ($user) {
                        $user->update([
                            'password' => Hash::make($this->newpassword),
                            'updated_at' => now(),
                        ]);

                        Alert::success('BERHASIL!','Password Anda berhasil diperbaharui!');
                    } else {
                        Alert::error('GAGAL!','Password Anda gagal diperbaharui!');
                    }
                } else {
                    Alert::warning('GAGAL!','Password lama yang Anda masukkan salah!');
                }

            } else {
                Alert::warning('GAGAL!','Password yang Anda masukkan tidak sama!');
            }
        }


        return redirect()->route('user.profil', Auth::user()->id);
    }

    public function render()
    {
        return view('livewire.user.edpassword');
    }
}
