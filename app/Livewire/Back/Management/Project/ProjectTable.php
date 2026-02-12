<?php

namespace App\Livewire\Back\Management\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Reactive;

class ProjectTable extends Component
{
    use WithPagination;

    #[Reactive]
    public string $search = '';

    #[Reactive]
    public string $status = 'pending';

    #[On('reloadData')]
    public function reloadData()
    {
        // Event hook to refresh table after create/update/delete.
    }

    public function editProject($id)
    {
        $this->dispatch('editProject', $id);
    }

    public function deleteProject($id)
    {
        $this->dispatch('deleteProject', $id);
    }


    public function render()
    {
        $projects = Project::query()
            ->when(
                $this->search,
                fn($q) =>
                $q->where(
                    fn($q) =>
                    $q->where('name', 'like', "%{$this->search}%")
                )
            )
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->get();
        return view(
            'livewire.back.management.project.project-table',
            [
                'projects' => $projects
            ]
        );
    }
}
