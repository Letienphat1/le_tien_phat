<?php

namespace App\Livewire\Back\Management\Project;

use Livewire\Component;

class ProjectIndex extends Component
{
    public string $search = '';

    public string $status = '';

    public function resetFilter()
    {
        $this->reset(['status', 'search']);
    }

    public function addProject()
    {
        //dd('ok');
        $this->dispatch('addProject');
    }
    public function render()
    {
        return view('livewire.back.management.project.project-index');
    }
}
