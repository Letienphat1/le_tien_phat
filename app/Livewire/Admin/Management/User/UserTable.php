<?php

namespace App\Livewire\Admin\Management\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public $search = '';
    public $role = '';
    public $status = 'active';
    public $perPage = 15;

    public function placeholder()
    {
        return view('components.placeholder.management-user');
    }

    #[On('filterUser')]
    public function filterUser($filter)
    {
        $this->search  = $filter['search']  ?? '';
        $this->role    = $filter['role']    ?? '';
        $this->status  = $filter['status']  ?? 'active';
        $this->perPage = $filter['perPage'] ?? 15;

        $this->resetPage();
    }

    public function editUser($id)
    {
        $this->dispatch('editUser',$id);
    }

    public function deleteUser($id)
    {
        $this->dispatch('deleteUser',$id);
    }

    #[On('reloadData')]
    public function render()
    {
        $users = User::query()
            ->when(
                $this->search,
                fn($q) =>
                $q->where(
                    fn($q) =>
                    $q->where('name', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%")
                )
            )
            ->when($this->role, fn($q) => $q->where('role', $this->role))
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->paginate($this->perPage);

        return view('livewire.admin.management.user.user-table', [
            'users' => $users,
        ]);
    }
}
