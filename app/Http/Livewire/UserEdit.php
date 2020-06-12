<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class UserEdit extends Component
{
    public $user_id;
    public $name;
    public $email;

    public function mount($id)
    {
        $user = User::find($id);

        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updateUser()
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
        ];

        $ruleMessages = [
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak sesuai',
        ];

        $this->validate($rules, $ruleMessages);

        $user = User::find($this->user_id);

        $user->name = $this->name;
        $user->email = $this->email;

        $user->save();

        session()->flash('message', 'User successfully updated.');

        return redirect()->route('user.index');
    }

    public function render()
    {
        return view('edit');
    }
}
