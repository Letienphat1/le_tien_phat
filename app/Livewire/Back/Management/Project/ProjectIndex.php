<?php

namespace App\Livewire\Back\Management\Project;

use Livewire\Component;

class ProjectIndex extends Component
{

    public function addProject(){
        //dd('ok');
        $this->dispatch('addProject');
    }
    public function render()
    {
        return view('livewire.back.management.project.project-index');
    }
}
