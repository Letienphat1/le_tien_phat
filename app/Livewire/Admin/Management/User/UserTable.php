<?php

namespace App\Livewire\Admin\Management\User;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
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

    protected $queryString = [];

    public function placeholder()
    {
        return view('components.placeholder.management-user');
    }

    #[On('resetPageData')]
    public function resetPageData()
    {
        $this->resetPage();
    }

    #[Computed]
    public function users()
    {
        return User::query()
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
    }

    public function render()
    {
        return view('livewire.admin.management.user.user-table');
    }
}
