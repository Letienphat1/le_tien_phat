<?php

namespace App\Livewire\Admin\Management\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{

    use WithPagination;

    public function render()
    {
        $users = User::query()->paginate(10);
        return view('livewire.admin.management.user.user-table',[
            'users' => $users
        ]);
    }
}
