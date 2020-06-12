<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function addUser()
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ];

        $ruleMessages = [
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak sesuai',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 3 karakter',
            'password.confirmed' => 'Password tidak cocok',
        ];

        $this->validate($rules, $ruleMessages);

        $user = new User();

        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);

        $user->save();

        session()->flash('message', 'User successfully stored.');

        return redirect()->route('user.index');
    }

    public function render()
    {
        return view('create');
    }
}
