<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $pagination = 6;

    public $search;

    public $confirm;

    protected $updatesQueryString = [
        'search' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->confirm = $id;
    }

    public function deleted($id)
    {
        User::destroy($id);
        session()->flash('message', 'User successfully deleted.');
    }

    public function render()
    {
        $users = User::whereNotIn('id', [1])
            ->paginate($this->pagination);

        if ($this->search != null) {
            $users = User::whereNotIn('id', [1])
                ->where('name', 'like', '%' . $this->search . '%')
                ->paginate($this->pagination);
        }

        return view('index')
            ->with('users', $users);
    }
}
