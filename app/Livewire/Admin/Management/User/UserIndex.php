<?php

namespace App\Livewire\Admin\Management\User;

use Livewire\Component;

class UserIndex extends Component
{
    public string $search = '';
    public string $role = '';
    public string $status = 'active';
    public string $perPage = '15';

    public function resetFilter()
    {
        $this->reset(['search', 'role', 'status', 'perPage']);
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
