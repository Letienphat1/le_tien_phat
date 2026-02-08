<?php

namespace App\Livewire\Back\Management\Project;

use Flux\Flux;
use App\Models\Project;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ProjectTable extends Component
{
    public $name, $description, $status, $date_deadline, $time_deadline;
    public $projectId = '';
    public $isUpdateProject = false;
    use WithPagination;

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
        $projects = Project::get();
        return view(
            'livewire.back.management.project.project-table',
            [
                'projects' => $projects
            ]
        );
    }
}
