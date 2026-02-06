<?php

namespace App\Livewire\Back\Management\Project;

use App\Models\Project;
use Flux\Flux;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;
use Carbon\Constants\Format;

class ProjectActions extends Component
{
    public $name, $description, $status, $date_deadline, $time_deadline;

    #[On('addProject')]
    public function addProject()
    {
        //dd('ok');
        Flux::modal('action-project')->show();
    }

    public function createProject()
    {
        $this->validate();
        //validate
        //dd($this->all());
        $deadlineAt = Carbon::createFromFormat(
            'Y-m-d H:i',
            $this->date_deadline . ' ' . $this->time_deadline,
            config('app.timezone')
        );

        Project::create([
            'name' => $this->name,
            'description' => $this->description,
            'deadline_at' => $deadlineAt,
        ]);
        Flux::modal('action-project')->close();
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_deadline' => 'required|date',
            'time_deadline' => 'required',
        ];
    }



    public function render()
    {
        return view('livewire.back.management.project.project-actions');
    }
}
