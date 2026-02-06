<?php

namespace App\Livewire\Back\Management\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectTable extends Component
{
    use WithPagination;

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
