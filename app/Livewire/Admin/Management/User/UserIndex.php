<?php

namespace App\Livewire\Admin\Management\User;

use Livewire\Component;

class UserIndex extends Component
{
    public $search = '';
    public $role = '';
    public $status = 'active';
    public $perPage = '15';

    public function updated()
    {
        $this->dispatch('resetPageData');
    }

    public function resetFilter()
    {
        $this->redirectRoute('admin.management.users', navigate: true);
    }

    public function addUser()
    {
        $this->dispatch('addUser');
    }

    public function render()
    {
        return view('livewire.admin.management.user.user-index');
    }
}
