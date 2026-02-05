<?php

namespace App\Livewire\Admin\Management\User;

use Livewire\Component;

class UserIndex extends Component
{
    public $search = '';
    public $role = '';
    public $status = 'active';
    public $perPage = '15';

    public function updated($property)
    {
        if (! in_array($property, ['search', 'role', 'status', 'perPage'])) {
            return;
        }

        $this->dispatch('filterUser', [
            'search'  => $this->search,
            'role'    => $this->role,
            'status'  => $this->status,
            'perPage' => $this->perPage,
        ]);
    }

    public function resetFilter()
    {
        $this->reset(['search', 'role', 'status', 'perPage']);

        $this->dispatch('filterUser', [
            'search'  => '',
            'role'    => '',
            'status'  => 'active',
            'perPage' => '15',
        ]);
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
