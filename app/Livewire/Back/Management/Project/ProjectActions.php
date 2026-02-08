<?php

namespace App\Livewire\Back\Management\Project;

use App\Models\Project;
use Flux\Flux;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;

class ProjectActions extends Component
{
    public $name, $description, $date_deadline, $time_deadline;
    public $isUpdateProject = false;

    public $projectId;

    public  $status = 'pending';

    #[On('addProject')]
    public function addProject()
    {
        //dd('ok');
        $this->resetData();

        $this->isUpdateProject = false;
        Flux::modal('action-project')->show();
    }

    public function createProject()
    {
        $this->validate();
        //validate
        //dd($this->all());

        Project::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        Flux::modal('action-project')->close();

        $this->dispatch('reloadData');
    }

    #[On('editProject')]
    public function editProject($id)
    {
        $this->resetData();
        $project = Project::find($id);

        $this->projectId = $project->id;

        $this->name = $project->name;
        $this->description = $project->description;
        $this->status = $project->status;

        if ($project->deadline_at) {
            $deadline = Carbon::parse($project->deadline_at);

            $this->date_deadline = $deadline->toDateString();   // Y-m-d
            $this->time_deadline = $deadline->format('H:i');    // H:i
        }

        $this->isUpdateProject = true;
        Flux::modal('action-project')->show();
    }

    public function updateProject()
    {
        $this->validate();

        $project = Project::find($this->projectId);

        $deadlineAt = null;

        if ($this->date_deadline && $this->time_deadline) {
            $deadlineAt = Carbon::createFromFormat('Y-m-d H:i', $this->date_deadline . ' ' . $this->time_deadline, config('app.timezone'));
        }

        $project->update([
            'name' => $this->name,
            'description' => $this->description,
            'description' => $this->description,
            'deadline_at' => $deadlineAt,
            'status' => $this->status,
        ]);
        $this->modal('action-project')->close();

        $this->dispatch('reloadData');
    }

    
    #[On('deleteProject')]
    public function deleteProject($id)
    {

        //dd($id);
        $project = Project::findOrFail($id);

        $this->projectId = $project->id;

        $this->name = $project->name;

        Flux::modal('delete-project')->show();
    }

    public function deleteProjectConfirm()
    {
        $project = Project::findOrFail($this->projectId);

        $project->delete();

        Flux::modal('delete-project')->close();

        $this->dispatch('reloadData');
    }

    public function resetData()
    {
        $this->reset([
            'name',
            'description',
            'date_deadline',
            'time_deadline',
        ]);
        $this->resetErrorBag();
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_deadline' => ($this->isUpdateProject ? 'required' : 'nullable') . '|date',
            'time_deadline' => ($this->isUpdateProject ? 'required' : 'nullable'),
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'Tên dự án là bắt buộc.',
            'name.max' => 'Tên dự án không quá 255 ký tự.',

            'date_deadline.required' => 'Ngày là bắt buộc.',
            'date_deadline.date' => 'Định dạng ngày.',

            'time_deadline.required' => 'Thời gian là bắt buộc.',
        ];
    }



    public function render()
    {
        return view('livewire.back.management.project.project-actions');
    }
}
