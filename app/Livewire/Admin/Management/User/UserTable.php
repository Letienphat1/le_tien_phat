<?php

namespace App\Livewire\Admin\Management\User;

use App\Models\User;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy]
class UserTable extends Component
{
    use WithPagination;

    #[Reactive]
    public string $search = '';

    #[Reactive]
    public string $role = '';

    #[Reactive]
    public string $status = 'active';

    #[Reactive]
    public string $perPage = '15';

    public function placeholder()
    {
        return view('components.placeholder.management-user');
    }

    #[On('reloadData')]
    public function reloadData()
    {
        // Event hook to refresh table after create/update/delete.
    }

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
            ->paginate((int) $this->perPage);

        return view('livewire.admin.management.user.user-table', [
            'users' => $users,
        ]);
    }
}
