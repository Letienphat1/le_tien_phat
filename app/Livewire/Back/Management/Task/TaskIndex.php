<?php

namespace App\Livewire\Back\Management\Task;

use App\Models\Project;
use Livewire\Component;

class TaskIndex extends Component
{
    public $name;
    public $tasks;
    public $statuses = ['todo', 'progress', 'review', 'done',];
    public function mount($id = null)
    {
        $project = Project::with('tasks')->find($id);
        if (!$project) {
            return $this->redirectRoute('back.management.projects', navigate: true);
        }
        $this->name = $project->name;
        $this->tasks = $project->tasks;
    }
    public function changeStatus($item, $position, $status = null)
    {
        dd( $item, $position, $status);
    }
    public function render()
    {
        return view('livewire.back.management.task.task-index',);
    }
}
